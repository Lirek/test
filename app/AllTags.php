<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllTags extends Model
{
    //Tabla Pivot para el sistema de etiquetas
    protected $table = 'all_tags';

         protected $fillable = [
        'music_id', 
        'tags_id',
        'songs_id',
        'movies_id',    
        ];

}
