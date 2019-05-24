<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiosTrace extends Model
{
    protected $table = 'radios_trace';

     protected $fillable = [
       'id',
       'radio_id',
       'user_id',
       'created_at'
     ];

   	public function Radio()
    {
    return $this->belongsTo('App\Radio', 'radio_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
