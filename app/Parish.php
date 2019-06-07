<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    //Tabla en donde estan guardadas las multiples etiquetas usadas por el sistema

     protected $table = 'parish';

         protected $fillable = [
        'id', 
        'parish_name', 
        ];

    public function city(){
     return $this->belongsTo(City::class);
	}

}
