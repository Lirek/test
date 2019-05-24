<?php

namespace App\Listeners;

use App\Events\MegazineTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MegazineTrace;

class RegisterMegazineTrace
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
     * @param  MegazineTraceEvent  $event
     * @return void
     */
    public function handle(MegazineTraceEvent $event)
    {
        $new_trace = new MegazineTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->megazine_id = $event->megazine_id;
        $new_trace->save();
    }
}
