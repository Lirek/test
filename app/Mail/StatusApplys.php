<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusApplys extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $applys;
    public $url;
    public $x;

    public function __construct($applys,$x)
    {
        $this->applys = $applys;
        $this->url = config('app.url').'/seller_complete_f/'.$this->applys->id.'/'.$this->applys->token;
        //$this->url = 'https://prueba.leipel.com/seller_complete_f/'.$this->applys->id.'/'.$this->applys->token;
        $this->x=$x;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->applys->status=='Aprobado')
        {
        return $this->view('admin.mails.status_applys_aproval')->subject('Solicitud pre-aprobada')->with('applys',$this->applys)->with('url',$this->url);
        }
        else
        {
         return $this->view('admin.mails.status_applys_denial')->subject('Solicitud rechazada')->with('applys',$this->applys)->with('x',$this->x);   
        }
    }
}
