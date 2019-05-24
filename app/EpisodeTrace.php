<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpisodeTrace extends Model
{
    protected $table = 'episodes_trace';

     protected $fillable = [
       'id',
       'episodes_id',
       'user_id',
       'created_at'
     ];

    public function User() {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function Episode() {
    	return $this->belongsTo('App\Episode', 'episodes_id');
    }
}
