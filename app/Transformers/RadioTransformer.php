<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Radio;

class RadioTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Radio $Radio)
    {
        return [
        'id'=> $Radio->id,
        'seller_id'=> $Radio->seller_id,
        'name_r'=> $Radio->name_r, 
        'streaming'=> $Radio->streaming,
        'logo'=> $Radio->logo, 
        'email_c'=> $Radio->email_c, 
        'google'=> $Radio->google,
        'instagram'=> $Radio->instagram, 
        'facebook'=> $Radio->facebook, 
        'twitter'=> $Radio->twitter
        ];
    }
}
