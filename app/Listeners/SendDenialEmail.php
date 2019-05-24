<?php

namespace App\Listeners;

use App\Events\ContentDenialEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContentDenial;

class SendDenialEmail
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
     * @param  ContentDenialEvent  $event
     * @return void
     */
    public function handle(ContentDenialEvent $event)
    {
        Mail::to($event->seller)->send(new ContentDenial($event->name,$event->reason));
    }
}
