<?php

namespace App\Listeners;

use App\Events\BuyContentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyContent;

class SendBuyContent
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
     * @param  BuyContentEvent  $event
     * @return void
     */
    public function handle(BuyContentEvent $event)
    {
          Mail::to($event->email)->send(new BuyContent($event->content,$event->cost));
    }
}
