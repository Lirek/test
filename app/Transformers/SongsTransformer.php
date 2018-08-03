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
    protected $availableIncludes   = [
        'autors',
        'Seller',
        'tags'
    ];

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
       $Autors=$Songs->Autors()->first();

       return $this->item($Autors,new MusicAuthorTransformer);
    }

    public function includeSeller(Songs $Songs)
    {
       $Seller=$Songs->Seller()->first();

       return $this->item($Seller,new SellerTransformer);
    }

    public function includeTags(Songs $Songs)
    {
        $Tags=$Songs->tags()->get();
         
         if($Tags->count() <= 0)
         {
            return $this->collection($Tags,new TagsTransformer);
         }
    }
}
