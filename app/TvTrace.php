<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvTrace extends Model
{
     protected $table = 'tv_trace';

     protected $fillable = [
       'id',
       'tv_id',
       'user_id',
       'created_at'
     ];

    public function Tv()
    {
    return $this->belongsTo('App\Tv', 'tv_id');
    }


    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
