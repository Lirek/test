<?php

namespace App\Listeners;

use App\Events\AlbumTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\AlbumsTrace;

class RegisterAlbumTrace
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
     * @param  AlbumTraceEvent  $event
     * @return void
     */
    public function handle(AlbumTraceEvent $event)
    {
        $new_trace = new AlbumsTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->albums_id = $event->album_id;
        $new_trace->save();
    }
}
