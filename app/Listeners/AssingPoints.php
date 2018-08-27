<?php

namespace App\Listeners;

use App\Events\AssingPointsEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\TicketsPackage;
use App\PointsAssings;
use App\SistemBalance;


class AssingPoints
{


    public function __construct()
    {
        //
    }


    public function handle(AssingPointsEvents $event)
    {
        $TicketsPackage = TicketsPackage::find($event->package_id);        

        $User = User::find($event->user_id);

        $points= $TicketsPackage->points;
    
        $i = 0;

       
         if ($User->UserRefered->count() == 0) 
         {
                $balance= SistemBalance::find(1);
                
                $balance->my_points= $balance->my_points + $points;
                
                $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;

                $balance->points_solds = $balance->points_sold + $points;
                
                $balance->save();

                $Assing = new PointsAssings;
                
                $Assing->amount = $points;
                
                $Assing->from =  0;
                
                $Assing->to =  0;
                
                $Assing->save();

         }   
        else                
        {
            while ($i <= $points) 
            {
                 $x = User::find($User->Refered->refered);

                 $x->points = $x->points + 1;
                 
                 $Assing = new PointsAssings;
                 
                 $Assing->amount = 1;
                 
                 $Assing->from =  $User->id;
                 
                 $Assing->to =  $x->id;

                 $Assing->save();

                 $y= $x->Refered->refered;

                 unset($x);

                 $x = User::find($y);

                 if ($x->count()==0) 
                 {  
                    $total = $points-$i;
                    
                    $balance= SistemBalance::find(1);
                    $balance->my_points= $balance->my_points + $total;
                    $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;
                     break;
                 }

                 $i++;
            }                 
        }

    }
}





