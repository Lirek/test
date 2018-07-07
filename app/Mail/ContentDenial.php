<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContentDenial extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $reason;

    public function __construct($name,$reason)
    {
        $this->name=$name;
        $this->reason=$reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('admin.mails.ContentDenial')->subject('Contenido Rechazado')->with('name',$this->name)->with('x',$this->reason);
    }
}
