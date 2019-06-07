<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //Tabla en donde estan guardadas las multiples etiquetas usadas por el sistema

     protected $table = 'province';

         protected $fillable = [
        'id', 
        'province', 
        ];

    public function region()
{
     return $this->belongsTo(Region::class);
}

}
