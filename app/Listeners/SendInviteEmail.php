<?php

namespace App\Listeners;

use App\Events\InviteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;

class SendInviteEmail
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
     * @param  InviteEvent  $event
     * @return void
     */
    public function handle(InviteEvent $event)
    {
      
        Mail::to($event->to)->send(new InviteMail($event->user,$event->url));
    }
}
