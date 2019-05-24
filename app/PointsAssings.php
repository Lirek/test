<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsAssings extends Model
{
     protected $table = 'points_assing';

         protected $fillable = [
        'amount',
        'id', 
        'from',
        'to',
        'status',
        'created_at',
        'updated_at',
        ];

        public function TracePointsFrom()
        {
        	return $this->belongsTo('App\User', 'from');
        }

        public function TracePointsTo()
        {
            return $this->belongsTo('App\User', 'to');
        }
}
