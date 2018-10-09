<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RollBacksTransacctions extends Model
{
    protected $table = 'transactions_rollbacks';

     protected $fillable = [
        'id',
		'id_points_sales',
		'id_points_assing',
		'id_tickets_sales',
		'id_transaction',
		'ammount_points',
		'ammount_ticktes'
    ];

     public function PointsSales()
    {
        return $this->hasOne('App\PointsSells','id_points_sales');
    }
    
     public function PointsAssing()
    {
        return $this->hasOne('App\PointsAssings','id_points_assing');
    }
    
     public function TicketsPackage()
    {
        return $this->hasOne('App\Payments','id_tickets_sales');
    }
    
     public function ContentsTransactions()
    {
        return $this->hasOne('App\Transactions','id_transaction');
    }
}
