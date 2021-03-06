<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusMagazines extends Mailable
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
            return $this->view('admin.mails.statusMegazineAproval')->subject('Revista aprobada')->with('title',$this->title);
        } else {
            return $this->view('admin.mails.statusMegazineDenial')->subject('Revista rechazada')->with('title',$this->title)->with('m',$this->message);
        }
    }
}
