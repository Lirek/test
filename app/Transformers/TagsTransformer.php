<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class TagsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Tags $Tags)
    {
        return [
            'id' => $Tags->id, 
            'tags_name' => $Tags->tags_name,
            'type_tags' => $Tags->type_tags, 
        ];
    }
}
