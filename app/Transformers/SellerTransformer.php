<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Seller;

class SellerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Seller $Seller)
    {
        return [
          'id' => $Seller->id,
          'name' => $Seller->name,
          'email' => $Seller->email, 
          'estatus' => $Seller->estatus,
          'promoter_id' => $Seller->promoter_id,
          'ruc_s' => $Seller->ruc_s,
          'descs_s' => $Seller->descs_s,
          'adj_ruc' => $Seller->adj_ruc,
          'tlf' => $Seller->tlf,
          'logo' => $Seller->logo,
          'created_at' => $Seller->created_at,
          'updated_at' => $Seller->updated_at,
        ];
    }
}
