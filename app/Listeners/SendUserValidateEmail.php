<?php

namespace App\Listeners;

use App\Events\UserValidateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
