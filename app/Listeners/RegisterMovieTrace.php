<?php

namespace App\Listeners;

use App\Events\MovieTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MoviesTrace;


class RegisterMovieTrace
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
     * @param  MovieTraceEvent  $event
     * @return void
     */
    public function handle(MovieTraceEvent $event)
    {
        $new_trace = new MoviesTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->movies_id = $event->movie_id;
        $new_trace->save();
    }
}
