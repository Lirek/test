<?php

namespace App\Listeners;

use App\Events\WelcomeEmailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;


class SendWelcomeEmail
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
     * @param  WelcomeEmail  $event
     * @return void
     */
    public function handle(WelcomeEmailEvent $event)
    {   
        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}
