<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Transformers\SongsTransformer;
use App\Transformers\MusicAuthorTransformer;
use App\Transformers\SellerTransformer;
use App\Transformers\TagsTransformer;


use App\Albums;
use App\Songs;
use App\music_authors;
use App\Seller;


class AlbumsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */

    protected $availableIncludes   = [
        'songs',
        'Autors',
        'Seller',
        'tags_music'
    ];

    public function transform(Albums $Albums)
    {
        

        return [
            
            'id' => (int) $Albums->id,

            'seller_id' => (int) $Albums->seller_id,

            'autors_id' => (int) $Albums->autors_id,

            'name_alb' => $Albums->name_alb,

            'cover' => $Albums->cover,

            'producer' => $Albums->producer,

            'duration' => $Albums->duration,

            'cost' => $Albums->cost,

            'rating_id' => (int) $Albums->rating_id,

            'publish_date' => $Albums->publish_date,

            'status' => $Albums->status, 
        ];
    }

    public function includeSongs(Albums $Albums)
    {
        $Songs=$Albums->songs;

        return $this->collection($Songs,new SongsTransformer);
    }

    public function includeAutors(Albums $Albums)
    {
       $Author=$Albums->Autors()->first();
       
       if ($Author->count() > 0) 
       {    
            return $this->item($Author ,new MusicAuthorTransformer());    
       }

    }

    public function includeSeller(Albums $Albums)
    {
        $Seller=$Albums->Seller;

        if ($Seller->count() > 0)
        {
        return $this->item($Seller,new SellerTransformer);
        }
    }

    public function includeTagsMusic(Albums $Albums)
    {
        $Tags=$Albums->tags_music;
         
         if($Tags->count() <= 0)
         {
            return $this->collection($Tags,new TagsTransformer);
         }
    }

}
