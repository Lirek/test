<?php

namespace App\Transformers;
use App\Sagas;
use League\Fractal\TransformerAbstract;

class SagaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Sagas $Sagas)
    {
        return [
            
        'id'=>$Sagas->id, 
        'seller_id'=>$Sagas->seller_id, 
        'rating_id'=>$Sagas->rating_id,
        'sag_name'=>$Sagas->sag_name, 
        'sag_description'=>$Sagas->sag_description,
        'img_saga'=>$Sagas->img_saga, 
        'status'=>$Sagas->status, 
        'type_saga'=>$Sagas->type_saga,
        
        ];
    }
}
