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

        //$variablesCorreo            = $request->all();        
        $variablesCorreo['subject'] = "Correo Informativo";

        $variablesCorreo['name_contacto'] = "Antonio Ruiz";
        $variablesCorreo['asunto_contacto'] = "Mensaje de Prueba";
        $variablesCorreo['mensaje_contacto'] = "Este es un cuerpo de mensaje que quiero enviar";
        $variablesCorreo['email_contacto'] = "Pos te lo env�e desde aca: uncorreo@dominio.com";                             
    

        \Mail::to('iruhary@gmail.com')->send(new GestorMail($variablesCorreo));            
        
        return redirect('/');
    }
}
