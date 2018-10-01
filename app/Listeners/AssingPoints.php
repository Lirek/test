<?php

namespace App\Listeners;

use App\Events\AssingPointsEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\TicketsPackage;
use App\PointsAssings;
use App\SistemBalance;
use App\Referals;


class AssingPoints
{


    public function __construct()
    {
        //
    }


    public function handle(AssingPointsEvents $event)
    {
      // if ($event->action=="accept") {
        $TicketsPackage = TicketsPackage::find($event->package_id);
        $User = User::find($event->user_id);
        $points= $TicketsPackage->points;
        $i = 0;
        if ($User->UserRefered->count() == 0) {

          $balance= SistemBalance::find(1);
          $balance->my_points= $balance->my_points + $points;
          $balance->points_solds = $balance->points_solds + $points;
          $balance->save();

          $Assing = new PointsAssings;
          $Assing->amount = $points;
          $Assing->from =  $User->id;
          $Assing->to =  0;
          $Assing->save();
        } else {
          $UserR = User::find($event->user_id);
          $id=$UserR->id;
          $Refered= collect(new User);

          while (true) {
            $pass = Referals::where('refered','=',$id)->first();
            if ($pass!=NULL) {
              $id=$pass->user_id;
              $Refered->push(User::find($id));
            } else {
              break;
            }   
          }

          foreach ($Refered as $key) {
            if($key->points == $key->limit_points) {
              $key->pending_points = $key->pending_points + 1;
            } else {
              $key->points = $key->points + 1; 
            }

            $key->save();
            $Assing1 = new PointsAssings;
            $Assing1->amount = 1;
            $Assing1->from = $UserR->id; 
            $Assing1->to =   $key->id;
            $Assing1->save();
          }

          $total = $points-$Refered->count();
          $balance = SistemBalance::find(1);
          $balance->points_solds = $balance->points_solds + $points;

          if ($total>0) {
            $balance->my_points= $balance->my_points + $total; 
            $balance->save();

            $Assing = new PointsAssings;
            $Assing->amount = $total;
            $Assing->from =  $User->id;
            $Assing->to =  0;
            $Assing->save();
          } else {
            $balance->save();
          }
        }
      // } else { // reversar
        $TicketsPackage = TicketsPackage::find($event->package_id);
        $User = User::find($event->user_id);
        $points= $TicketsPackage->points;
        //$i = 0;
        if ($User->UserRefered->count() == 0) {

          $balance= SistemBalance::find(1);
          $balance->my_points= $balance->my_points - $points;
          $balance->points_solds = $balance->points_solds - $points;
          $balance->save();
          /*
          $Assing = new PointsAssings;
          $Assing->amount = $points;
          $Assing->from =  $User->id;
          $Assing->to =  0;
          $Assing->save();
          */
          /*
          */
          $Assing = PointsAssings::where('amount',$points)->where('from',$User->id)->where('to',0)->get();
          $Assing->delete();
        } else {
          $UserR = User::find($event->user_id);
          $id=$UserR->id;
          $Refered= collect(new User);

          while (true) {
            $pass = Referals::where('refered',$id)->first();
            if ($pass!=NULL) {
              $id=$pass->user_id;
              $Refered->push(User::find($id));
            } else {
              break;
            }   
          }

          foreach ($Refered as $key) {
            if($key->points == $key->limit_points) {
              $key->pending_points = $key->pending_points - 1;
            } else {
              $key->points = $key->points - 1; 
            }
            /*
            $key->save();
            $Assing1 = new PointsAssings;
            $Assing1->amount = 1;
            $Assing1->from = $UserR->id; 
            $Assing1->to =   $key->id;
            $Assing1->save();
            */
            /*
            */
            $Assing = PointsAssings::where('amount',1)->where('from',$User->id)->where('to',$key->id)->get();
            $Assing->delete();
          }

          $total=$points-$Refered->count();
          $balance=  SistemBalance::find(1);
          $balance->points_solds = $balance->points_solds - $points;

          if ($total!=0) {
            $balance->my_points = $balance->my_points - $total; 
            $balance->save();
            /*
            $Assing = new PointsAssings;
            $Assing->amount = $total;
            $Assing->from =  $User->id;
            $Assing->to =  0;
            $Assing->save();
            */
            /*
            */
            $Assing = PointsAssings::where('amount',$total)->where('from',$User->id)->where('to',0)->get();
            $Assing->delete();
          } else {
            $balance->save();
          }
        }
      // }
    }
  }





