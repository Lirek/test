<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\music_authors;

class MusicAuthorTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(music_authors $Authors)
    {
        return [

            'id' => $Authors->id,
            'name' => $Authors->name,
            'type_authors' => $Authors->type_authors,
            'descripcion' => $Authors->descripcion,
            'country' => $Authors->country, 
            'photo' => $Authors->photo,
            'instagram' => $Authors->instagram,
            'facebook' => $Authors->facebook, 
            'twitter' => $Authors->twitter, 
            'youtube' => $Authors->google,
            'seller_id' => $Authors->seller_id,
        ];
    }
}
