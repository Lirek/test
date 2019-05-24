<?php

namespace App\Transformers;
use App\Megazines;

use League\Fractal\TransformerAbstract;

use App\Transformers\SellerTransformer;
use App\Transformers\TagsTransformer;
use App\Transformers\SagaTransformer;
use App\Transformers\RatingTransformer;

class MegazinesTransformer extends TransformerAbstract
{

    protected $availableIncludes   = [
            'Seller',
            'Sagas',
            'Rating',
            'Tags',
        ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Megazines $Megazines)
    {
        return [
           'id'=>$Megazines->id,
          'seller_id'=>$Megazines->seller_id,
          'title'=>$Megazines->title, 
          'cover'=>$Megazines->cover,
          'num_pages'=>$Megazines->num_pages,
          'descripcion'=>$Megazines->descripcion,
          'megazine_file'=>$Megazines->megazine_file,
          'saga_id'=>$Megazines->saga_id,
          'cost'=>$Megazines->cost,
          'status'=>$Megazines->status,
          'country'=>$Megazines->country,
          'rating_id'=>$Megazines->rating_id,
          'created_at'=>$Megazines->created_at,
          'updated_at'=>$Megazines->updated_at,
        ];
    }

    
    public function includeSagas(Megazines $Megazines)
    {
        $Saga=$Megazines->saga()->where('status','=','Aprobado')->first();

       return $this->item($Saga,new SagaTransformer);
    }
    
    public function includeSeller(Megazines $Megazines)
    {
        $Seller=$Megazines->seller()->first();

       return $this->item($Seller,new SellerTransformer);
    }
    
    public function includeTags(Megazines $Megazines)
    {
        $Tags=$Megazines->tags_megazines()->get();
         
         if($Tags->count() <= 0)
         {
            return $this->collection($Tags,new TagsTransformer);
         }
    }
    
    public function includeRating(Megazines $Megazines)
    {
        $Rating=$Megazines->Rating()->first();

       return $this->item($Rating,new RatingTransformer);
    }
}
