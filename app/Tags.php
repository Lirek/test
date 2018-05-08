<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //Tabla en donde estan guardadas las multiples etiquetas usadas por el sistema

     protected $table = 'tags';

         protected $fillable = [
        'id', 
        'tags_name',
        'type_tags',
        'status',
        'seller_id'  
        ];

 public function Musictags()
    {
        return $this->belongsToMany('App\MusicTags','music_tags','music_id','tags_id');
    }
}
