<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Rating;

class RatingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Rating $Rating)
    {
        return [
            'id'=>$Rating->id,
            'r_name'=>Rating->r_name,
            'r_descr'=>Rating->r_descr,
        ];
    }
}
