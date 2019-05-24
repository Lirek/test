<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeriesTrace extends Model
{
    protected $table = 'episodes_trace';

     protected $fillable = [
       'id',
       'episodes_id',
       'user_id',
       'created_at'
     ];

    public function Episodes()
    {
    return $this->belongsTo('App\Episodes', 'episodes_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
