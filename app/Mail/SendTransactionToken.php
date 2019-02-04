<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTransactionToken extends Mailable
{
    use Queueable, SerializesModels;


    public $token;
    public $cost;

    public function __construct($token,$cost)
    {
        $this->token=$token;
        $this->cost=$cost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mails.TokenMail')->subject('Codigo de Transaccion')
                    ->with('cost',$this->cost)
                    ->with('token',$this->token);
    }
}
