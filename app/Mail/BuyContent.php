<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyContent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$cost)
    {
        $this->content=$content;
        $this->cost=$cost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mails.BuyContent')->subject('Contenido Adquirido')
                        ->with('content',$this->content)
                        ->with('cost',$this->cost);
    }
}
