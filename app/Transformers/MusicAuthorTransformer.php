<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\music_authors;

class MusicAuthorTransformer extends TransformerAbstract
{
    
    protected $availableIncludes   = [
        'Seller',
        'Singles',
        'Albums',
    ];
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


    public function includeSeller(music_authors $Authors)
    {
        $Authors=$Authors->Seller;

        if ($Authors->count() > 0)
        {
        return $this->item($Authors,new SellerTransformer);
        }
    }

    public function includeSingles(music_authors $Authors)
    {
        $Singles = $Authors->songs()->where('cost','<>',Null)
                                    ->where('status','=','Aprobado')
                                    ->get(); 

        return $this->collection($Singles,new SongsTransformer);
    }

    public function includeAlbums(music_authors $Authors)
    {
        $Albums = $Authors->albums()->where('status','=','Aprobado')->get();

        return $this->collection($Albums,new AlbumsTransformer);   
    }
}
