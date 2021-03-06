<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusPublicationChain extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $title;
    public $status;
    public $message;

    public function __construct($title,$status,$message) {
        $this->title = $title;
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
            return $this->view('admin.mails.statusPublicationChainAproval')->subject('Cadena de publicación aprobada')->with('title',$this->title);
        } else {
            return $this->view('admin.mails.statusPublicationChainDenial')->subject('Cadena de publicación rechazada')->with('title',$this->title)->with('m',$this->message);
        }
    }
}
