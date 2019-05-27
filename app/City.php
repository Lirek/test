<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //Tabla en donde estan guardadas las multiples etiquetas usadas por el sistema

     protected $table = 'city';

         protected $fillable = [
        'id', 
        'city_name', 
        ];

    public function region(){
     return $this->belongsTo(Region::class);
	}

}
