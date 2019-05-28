<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //Tabla en donde estan guardadas las multiples etiquetas usadas por el sistema

     protected $table = 'country';

         protected $fillable = [
        'id', 
        'country_name', 
        ];

}