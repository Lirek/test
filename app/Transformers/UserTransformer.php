<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $User)
    {
        return [
                'name' => $User->name, 
                'last_name'=> $User->last_name,
                'email'=> $User->email, 
                'codigo_ref'=> $User->codigo_ref,
                'type_doc'=> $User->type_doc,
                'num_doc'=> $User->num_doc,
                'img_doc'=> $User->img_doc, 
                'type'=> $User->type, 
                'alias'=> $User->alias, 
                'img_perf'=> $User->img_perf,
                'credito'=> $User->credito,
                'fech_nac'=> $User->fech_nac,
                'status'=> $User->status,
                'id'=> $User->id,
                'verify'=> $User->verify,
                'points'=> $User->points,
                'pending_points'=> $User->pending_points

        ];
    }
}
