<?php

namespace App\Listeners;

use App\Events\TransactionToken;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mail\SendTransactionToken;
use Illuminate\Support\Facades\Mail;

class SendTokenEmail
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
     * @param  TransactionToken  $event
     * @return void
     */
    public function handle(TransactionToken $event)
    {
        Mail::to($event->email)->send(new SendTransactionToken($event->token,$event->cost));
    }
}
