<?php

namespace App\Listeners;

use App\Events\RadioTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\RadiosTrace;


class RegisterRadioTrace
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
     * @param  RadioTraceEvent  $event
     * @return void
     */
    public function handle(RadioTraceEvent $event)
    {
        $new_trace = new RadiosTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->radio_id = $event->radio_id;
        $new_trace->save();
    }
}
