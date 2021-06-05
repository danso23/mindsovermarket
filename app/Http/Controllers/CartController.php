<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Cart;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Http\Controllers\UtilsController AS Utils;
use Hamcrest\Util;

class CartController extends Controller{

    public function add (Request $request){
        $producto = ProductoModel::find($request->id_producto);
        //dd($producto);
        $utils = new Utils();
        \Cart::clear();
        \Cart::add(array(
            'id' => $producto->id_producto,
            'name' => $producto->nombre_producto,
            'price' => $utils->convertCurrency($producto->precio),//$this->convertCurrency($producto->precio),
            'quantity' => 1,
            'attributes' => array('url_imagen' => $producto->url_imagen),
        ));
        //return view('checkout');
        return redirect('cart/checkout');
        //return back()->with("success", "$producto->nombre_producto se agregó con éxito");
    }

    public function removeItem(Request $request){
        //$producto = ProductoModel::where('id', $request->id_producto)->firstOrFail();
        \Cart::remove([
            'id' => $request->id_producto
        ]);
        return back()->with("success", "Producto eliminado del carrito");
    }

    public function cart() {
        return view('checkout');
    }
    

    public function carrito(){
        $categorias = CategoriaModel::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $datos = array('categorias' => $categorias );
        return view('carrito')->with('datos', $datos);
    }

    public function guardaEnvio(Request $request){
        $datos = array(
            'pais'      => $request->pais,
            'estado'    => $request->estado,
            'direccion' => $request->direccion,
            'cp'        => $request->codigoPostal
        );
        return view('payment.payment')->with('datos', $datos);
    }
}
