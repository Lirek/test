<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicTags extends Model
{
    //Tabla Pivot para el sistema de etiquetas de musica
    protected $table = 'music_tags';

         protected $fillable = [
        'music_id', 
        'tags_id',
            ];

}
