<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //Tabla en donde estan guardadas las multiples etiquetas usadas por el sistema

     protected $table = 'region';

         protected $fillable = [
        'id', 
        'region_name', 
        ];

    public function country(){
     return $this->belongsTo(Country::class);
	}

}
