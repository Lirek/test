<?php

namespace App\Listeners;

use App\Events\SongTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SongsTrace;


class RegisterSongTrace
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
     * @param  SongTraceEvent  $event
     * @return void
     */
    public function handle(SongTraceEvent $event)
    {
        $new_trace = new SongsTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->songs_id = $event->song_id;
        $new_trace->save();
    }
}
