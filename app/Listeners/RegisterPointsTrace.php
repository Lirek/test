<?php

namespace App\Listeners;

use App\Events\PointsTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\PointsSells;

class RegisterPointsTrace
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
     * @param  PointsTraceEvent  $event
     * @return void
     */
    public function handle(PointsTraceEvent $event)
    {
        $PointsSells = new PointsSells;
        $PointsSells->id_content=$event->id_content;
        $PointsSells->type_content=$event->type_content;
        $PointsSells->ammount=$event->ammount;
        $PointsSells->save();        

    }
}
