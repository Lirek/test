<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Songs;

class SongsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Songs $Songs)
    {
        return [
                'id' => $Songs->id,
                'autors_id' => $Songs->autors_id, 
                'seller_id' => $Songs->seller_id,
                'album'=> $Songs->album,
                'song_file'=> $Songs->song_file,
                'song_name'=> $Songs->song_name,
                'cost'=> $Songs->cost,
                'publish_date'=> $Songs->publish_date,
                'duration'=> $Songs->duration,
                'status'=> $Songs->status,
        ];
    }

    public function includeAutors(Songs $Songs)
    {
       $Autors=$Songs->Autors()->get();

       return $this->collection($Autors,new MusicAuthorTransformer);
    }
}
