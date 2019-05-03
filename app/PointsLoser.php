<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsLoser extends Model
{
    protected $table = 'points_loser';

    protected $fillable = [
		    'id',
        'user_id',
        'points',
        'reason'
    ];

    public function pointLoser()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
