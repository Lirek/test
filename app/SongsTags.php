<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongsTags extends Model
{
    //tabla pivot para musica
    
  protected $table = 'songs_tags';

         protected $fillable = [
        'songs_id', 
        'tags_id',
            ];
}
