<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SistemBalance extends Model
{
     protected $table = 'system_balance';

  	  protected $fillable = ['id',
  	  						 'tickets_solds',
  	  						 'points_solds',
  	  						 'my_points',
  	  						 'points_sells',
  	  						 'tickets_sells',
  	  						 'tickets_rolled',
  	  						 'points_rolled',
  	  						 'created_at',
  	  						 'updated_at'];
}
