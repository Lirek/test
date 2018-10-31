<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusPayments extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $cita;
    public $status;
    public $message;

    public function __construct($cita,$status,$message) {
        $this->cita = $cita;
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        switch ($this->status) {
            case "Por cobrar":
                $this->cita = date("d/m/Y", strtotime($this->cita));
                return $this->view('admin.mails.DeferredPayments')->subject('Pago aprobado')->with('cita',$this->cita);
                break;
            case "Diferido":
                return $this->view('admin.mails.PaymentsCharged')->subject('Pago cobrado');
                break;
            default:
                return $this->view('admin.mails.PaymentsDenial')->subject('Pago rechazado')->with('m',$this->message);
                break;
        }
    }
}
