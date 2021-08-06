<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\GestorMail;

class UtilsController extends Controller{

    public function __construct(){
        $this->from_currency ="USD";
        $this->to_currency ="MXN";
        $this->apikey ="8e934db21f24dfa008ad";
    }
    
    public function convertCurrency($amount){
        $apikey = $this->apikey;
      
        $from_Currency = urlencode($this->from_currency);
        $to_Currency = urlencode($this->to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";
      
        // URL para solicitar los datos
        /*$json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
        $obj = json_decode($json, true);
      
        $val = floatval($obj["$query"]);
        $total = $val * $amount;
        return number_format($total, 2, '.', '');*/
        return $amount;
    }

    public function EnvioCorreo(Request $request){
        $email = $request->email;
        //$variablesCorreo            = $request->all();        
        $variablesCorreo['subject'] = "Suscripción MOM";

        $variablesCorreo['name_contacto'] = "Antonio Ruiz";
<<<<<<< HEAD
        $variablesCorreo['asunto_contacto'] = "Suscripción Minds Over Market";
        $variablesCorreo['mensaje_contacto'] = "Bienvenido a la academia Minds Over Market. Gracias por suscribirte con nosotros. La suscripción se renovará automáticamente al terminar el plazo.";
        $variablesCorreo['email_contacto'] = "Cualquier duda puedes escribirnos al correo: contacto@mindsovermarket.com";                             
    
=======
        $variablesCorreo['asunto_contacto'] = "Mensaje de Prueba";
        $variablesCorreo['mensaje_contacto'] = "Este es un cuerpo de mensaje que quiero enviar";
        $variablesCorreo['email_contacto'] = "Pos te lo envíe desde aca: uncorreo@dominio.com";                             
        $variablesCorreo['plantilla'] ="plantillasMail.pruebaMail";
>>>>>>> d20867c2cfb58e81bf18ff42867dd55bb3aba5ca

        \Mail::to($email)->send(new GestorMail($variablesCorreo));
        
        return redirect('/');
    }
}
