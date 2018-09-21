<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsSells extends Model
{
   protected $table = 'points_sales';

   protected $fillable = [
      'id',
      'id_content', 
      'type_content',
      'ammount',
      'created_at',
      'updated_at',
    ];
}
