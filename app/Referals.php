<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referals extends Model
{
    protected $table = 'referals';

   		protected $fillable = [
             'id',
             'user_id',
             'refered',
             'my_code'
    			];

   public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }

    public function Refered()
    {
        return $this->hasMany('App\User', 'refered');
    }

    
}
