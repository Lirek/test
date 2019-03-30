<?php

namespace App\Listeners;

use App\Events\StatusBidder;
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
    public function handle(StatusBidder $event) {
        Mail::to($event->bidder->email)->send(new BidderChangeStatus($event));
    }
}
