<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongsTrace extends Model
{
    protected $table = 'songs_trace';

     protected $fillable = [
       'id',
       'songs_id',
       'user_id',
       'created_at'
     ];

    public function Songs()
    {
    return $this->belongsTo('App\Songs', 'song_id');
    }


    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
