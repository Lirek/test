<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\BookAuthor;

class BooksAuthorTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(BookAuthor $BookAuthor)
    {
        return [
           'seller_id'=>$BookAuthor->seller_id, 
           'full_name'=>$BookAuthor->full_name, 
           'photo'=>$BookAuthor->photo,
           'email_c'=>$BookAuthor->email_c,
           'google'=>$BookAuthor->google,
           'instagram'=>$BookAuthor->instagram,
           'facebook'=>$BookAuthor->facebook,
           'twitter'=>$BookAuthor->twitter,
           'id'=>$BookAuthor->id, 
           'status'=>$BookAuthor->status,
        ];
    }
}
