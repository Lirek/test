<?php

namespace App\Listeners;

use App\Events\PaymentDenialEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentDenial;

class SendPaymentDenialEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaymentDenialEvent  $event
     * @return void
     */
    public function handle(PaymentDenialEvent $event)
    {
         Mail::to($event->email)->send(new PaymentDenial($event->reason));
    }
}
