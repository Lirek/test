<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\TicketsPackage;

class PackageTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(TicketsPackage $Tickets)
    {
        return [
        'id'=> $Tickets->id, 
        'amount'=> $Tickets->amount,
        'photo'=> $Tickets->photo,
        'name'=> $Tickets->name,
        'points'=> $Tickets->points,
        'cost'=> $Tickets->cost,
        'promoter_id'=> $Tickets->promoter_id,
        'points_cost'=> $Tickets->points_cost,
        ];
    }
}
