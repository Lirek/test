<?php

namespace App\Listeners;

use App\Events\DeleteAccount;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\TicketsPackage;
use App\PointsAssings;
use App\SistemBalance;
use App\Referals;
use App\Payments;

class DeleteAccount
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
     * @param  DeleteAccount  $event
     * @return void
     */
    public function handle(DeleteAccount $event)
    {
        $User = User::find($event->user);

        if ($User->points!=0)
        {
            $balance= SistemBalance::find(1);
            $balance->my_points= $balance->my_points + $User->points;
            $balance->save();

            $Assing = new PointsAssings;
            $Assing->amount = $User->points;
            $Assing->from =  $User->id;
            $Assing->to =  0;
            $Assing->save();
        }

        if ($User->pending_points!=0)
        {
            $balance= SistemBalance::find(1);
            $balance->my_points= $balance->my_points + $User->pending_points;
            $balance->save();

            $Assing = new PointsAssings;
            $Assing->amount = $User->pending_points;
            $Assing->from =  $User->id;
            $Assing->to =  0;
            $Assing->save();
        }

    }
}
