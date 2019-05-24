<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviesTrace extends Model
{
    protected $table = 'movies_trace';

     protected $fillable = [
       'id',
       'movies_id',
       'user_id',
       'created_at'
     ];

   	public function Movies()
    {
    return $this->belongsTo('App\Movie', 'movies_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
