<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusProducts extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $product;
    private $reason;
    public function __construct($product,$reason) {
        $this->product = $product;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        if ($this->product->status!="Denegado") {
            return $this->view('admin.mails.ProductAproved')->subject('Producto aprobado')->with('name',$this->product->name);
        } else {
            return $this->view('admin.mails.ProductDenied')->subject('Producto denegado')->with('name',$this->product->name)->with('reason',$this->reason);
        }
    }
}
