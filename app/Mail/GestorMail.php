<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GestorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos){
        $this->datos    = $datos;
        $this->subject  = $datos['subject'];
        $this->plantilla = $datos['plantilla'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        
        return $this->view($this->plantilla)->subject($this->subject);

    }
}
