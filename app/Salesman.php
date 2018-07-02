<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $table = 'salesman';

   protected $fillable = [
      'id',
      'name', 
      'adress',
      'phone',
      'email',
      'created_at',
      'updated_at',
      'promoter_id',
    ];

    public function Applys()
    {
        return $this->hasMany('App\ApplysSellers','salesman_id');
    
    }

    public function CreatedBy()
    {
    	return $this->belongsTo('App\Promoters', 'promoter_id');
    }

}
