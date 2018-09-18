<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Tv;

class TvTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Tv $Tv)
    {
        return [
        'id'=> $Tv->id,
        'seller_id'=> $Tv->seller_id,
        'name_r'=> $Tv->name_r, 
        'streaming'=> $Tv->streaming,
        'logo'=> $Tv->logo, 
        'email_c'=> $Tv->email_c, 
        'google'=> $Tv->google,
        'instagram'=> $Tv->instagram, 
        'facebook'=> $Tv->facebook, 
        'twitter'=> $Tv->twitter
        ];
    }
}
