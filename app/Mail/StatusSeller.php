<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusSeller extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $status;
    public $message;

    public function __construct($status,$message) {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        if ($this->status=="Aprobado") {
            return $this->view('admin.mails.statusSellerAproval')->subject('Usuario aprobado');
        } else {
            return $this->view('admin.mails.statusSellerDenial')->subject('Usuario rechazado')->with('m',$this->message);
        }
    }
}
