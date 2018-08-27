<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsAssings extends Model
{
     protected $table = 'points_assing';

         protected $fillable = [
        'amount', 
        'from',
        'to',
        'created_at',
        'updated_at',
        ];

        public function TracePoints()
        {
        	return $this->belongsTo('App\User', 'user_id');
        }
}
