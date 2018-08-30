<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumsTrace extends Model
{
    protected $table = 'albums_trace';

     protected $fillable = [
       'id',
       'albums_id',
       'user_id',
       'created_at'
     ];

    public function Albums()
    {
    return $this->belongsTo('App\Albums', 'albums_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }

}
