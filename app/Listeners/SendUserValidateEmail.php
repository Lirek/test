<?php

namespace App\Listeners;

use App\Events\UserValidateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserAprobal;
use App\Mail\UserDenial;

class SendUserValidateEmail
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
     * @param  UserValidateEvent  $event
     * @return void
     */
    public function handle(UserValidateEvent $event)
    {
        if ($event->status == 1) 
        {
            Mail::to($event->email)->send(new UserAprobal());
            
        }
        else
        {
            Mail::to($event->email)->send(new UserDenial($event->reason));

        }
    }
}
