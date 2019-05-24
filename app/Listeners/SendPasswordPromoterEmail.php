<?php

namespace App\Listeners;

use App\Events\PasswordPromoter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PromoterPassword;

class SendPasswordPromoterEmail
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
     * @param  PasswordPromoter  $event
     * @return void
     */
    public function handle(PasswordPromoter $event)
    {
        Mail::to($event->email)->send(new PromoterPassword($event->password));
    }
}
