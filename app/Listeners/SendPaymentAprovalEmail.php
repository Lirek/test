<?php

namespace App\Listeners;

use App\Events\PayementAprovalEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentAproval;

class SendPaymentAprovalEmail
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
     * @param  PayementAprovalEvent  $event
     * @return void
     */
    public function handle(PayementAprovalEvent $event)
    {
        Mail::to($event->email)->send(new PaymentAproval());

    }
}
