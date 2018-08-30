<?php

namespace App\Listeners;

use App\Events\EpisodeTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SeriesTrace;


class RegisterEpisodeTrace
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
     * @param  EpisodeTraceEvent  $event
     * @return void
     */
    public function handle(EpisodeTraceEvent $event)
    {
        $new_trace = new SeriesTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->episodes_id = $event->episode_id;
        $new_trace->save();
    }
}
