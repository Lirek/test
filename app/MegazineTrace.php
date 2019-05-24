<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MegazineTrace extends Model
{
    protected $table = 'megazine_trace';

     protected $fillable = [
       'id',
       'megazine_id',
       'user_id',
       'created_at'
     ];

    public function Megazines()
    {
    return $this->belongsTo('App\Megazines', 'megazine_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
