<?php

namespace App\Listeners;

use App\Events\StatusBidderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\BidderChangeStatus;

class StatusBidder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StatusBidder  $event
     * @return void
     */
    public function handle(StatusBidderEvent $event) {
        Mail::to($event->bidder->email)->send(new BidderChangeStatus($event));
    }
}
