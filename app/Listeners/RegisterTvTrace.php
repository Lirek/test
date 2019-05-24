<?php

namespace App\Listeners;

use App\Events\TvTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TvTrace;


class RegisterTvTrace
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
     * @param  TvTraceEvent  $event
     * @return void
     */
    public function handle(TvTraceEvent $event)
    {
        $new_trace = new TvTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->tv_id = $event->tv_id;
        $new_trace->save();
    }
}
