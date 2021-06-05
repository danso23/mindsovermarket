<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;
class WhatsappController extends Controller
{
    public function sendMessage(Request $request){
        //print_r(csrf_token());exit;
        $sid = "AC33c31f03b91d7ce74f370d1d89b98bdd";//env("TWILIO_ACCOUNT_SID");
        $token = "59b8ee4f24385175b148f016d32365e1";//env("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
        ->create("whatsapp:+52".$request->number, // to
            [
                "from" => "whatsapp:+14155238886",
                "body" => "Hello there!"
            ]
        );
        

        print_r($message);
    }
}
