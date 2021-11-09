<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Charge as ChargeDB;
use App\Models\VentaModel as Venta;
use App\Models\Detalle_VentaModel as Detalle;
use Stripe;
use Cart;
use DB;

class PaymentController extends Controller
{
    public function index(){
        return view('payment.payment');
    }

    // Metodo que procesa el pago y realiza el registro tanto en la DB como en la plataforma de stripe.
    public function processPayment(Request $request){

        
         
        DB::beginTransaction();
        try {

            $stripe = Stripe\Stripe::setApiKey('sk_test_51JgH49Jjp1PfXXy1xCWNiGDlE8chsbcmT0GWzoZpgde4uSP34OEg2qPdHuqJQWIk6iuSc7acIboBnEzaU56OzvAV00YuDZbsvf');

            $response = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                            'price' => 'price_1JkfmPJjp1PfXXy1WIbpQoFr',
                            'quantity' => 1,
                        ]],
                'mode' => 'subscription',
                'success_url' => 'https://www.facebook.com',
                'cancel_url' => 'https://www.yahoo.com'
            ]);

            return response()->json($response, 200);



            $stripe = Stripe\Stripe::setApiKey('sk_test_51JgH49Jjp1PfXXy1xCWNiGDlE8chsbcmT0GWzoZpgde4uSP34OEg2qPdHuqJQWIk6iuSc7acIboBnEzaU56OzvAV00YuDZbsvf');
            
            // Crea la tarjeta o token que servira para realizar el pago
            $response = \Stripe\Token::create([
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )
            ]);

            return response()->json($response,200);

            $venta = new Venta();
            $venta->fecha_venta = date('Y-m-d');
            $venta->total_productos = \Cart::getTotalQuantity();
            $venta->save();
            
            $id_venta = (isset($venta->id_venta) && $venta->id_venta != "") ? $venta->id_venta : "";
            $cartCollection = \Cart::getContent();
            foreach ($cartCollection as $r){
                $detalle = new Detalle();
                $detalle->id_venta      = $id_venta;
                $detalle->id_producto   = $r->id;
                $detalle->precio        = $r->price;
                $detalle->cantidad      = $r->quantity;
                $detalle->save();
            }

            // Se genera el cargo a pagar y se pasa la terjeta previamente creada
            $charge = \Stripe\Charge::create([
                'currency' => 'USD',
                'amount' =>  $total * 100,
                'description' => 'Compra N°' . $id_venta,
                'source' => $response['id']
            ]);

            // Se guarda el pago en la DB para mantener el registro, al igual que se guarda en la plataforma
            // de stripe.
            $chargeDB = new ChargeDB();
            $chargeDB->cardholder = $request->input('cardholder');
            $chargeDB->stripe_id = $charge['id'];
            $chargeDB->card_brand = $response['card']['brand'];
            $chargeDB->card_last_four = $response['card']['last4'];
            $chargeDB->total = $total;
            $chargeDB->save();

            $datos = array(
                'id_compra'     => $id_venta,
                'productos'     => $cartCollection,
                'total_compra'  => $total,
                'fecha'         => date('d/m/Y'),
                'direccion'     => $request->input('direccion'),
                'estado'        => $request->input('estado'),
                'pais'          => $request->input('pais'),
                'cp'            => $request->input('cp'),
                'cliente'        => $request->input('cardholder')
            );
            DB::commit();
            // Se hace el redirect a la misma pagina con un mensaje de error o exito.
            if($charge['status'] == 'succeeded') {
                \Cart::clear();
                $datos['success'] = 'La compra se ha realizado con éxito';
                return view('ticket')->with('datos', $datos);
            } else {
                return redirect('payment')->with('error', 'Algo salió mal, por favor intenta de nuevo o contacta al administrador.');
            }
 
        }
        catch (\Exception $e) {
            DB::rollBack();
            dd("Error ".$e->getMessage());
            return redirect('payment')->with('error', $e->getMessage());
        }
    }

    public function ticket($ticket = array()){
        return view('ticket');
    }
}
