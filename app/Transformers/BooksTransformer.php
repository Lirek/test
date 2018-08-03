<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\BookAuthor;
use App\Seller;
use App\Sagas;
use App\Rating;
use App\Book;



use App\Transformers\SellerTransformer;
use App\Transformers\TagsTransformer;
use App\Transformers\SagaTransformer;
use App\Transformers\BookAuthorTransformer;
use App\Transformers\RatingTransformer;

class BooksTransformer extends TransformerAbstract
{
    
        protected $availableIncludes   = [
            'Seller',
            'Saga',
            'Rating',
            'Author',
        ];


    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Book $Books)
    {
        return [

            'seller_id'=>$Books->seller_id, 
            'author_id'=>$Books->author_id, 
            'title'=>$Books->title,
            'id'=>$Books->id,
            'original_title'=>$Books->original_title, 
            'cover'=>$Books->cover, 
            'sinopsis'=>$Books->sinopsis,
            'books_file'=>$Books->books_file,
            'country'=>$Books->country, 
            'after'=>$Books->after, 
            'before'=>$Books->before,
            'saga_id'=>$Books->saga_id, 
            'release_year'=>$Books->release_year, 
            'cost'=>$Books->cost, 
            'status'=>$Books->status,
            'rating_id'=>$Books->rating_id,
        ];
    }

    public function includeSeller(Book $Books)
    {
        $Seller=$Books->seller()->first();

       return $this->item($Seller,new SellerTransformer);
    }

    public function includeSaga(Book $Books)
    {
        $Saga=$Books->saga()->where('type_saga','=','Libros')->first();

       return $this->item($Saga,new SagaTransformer);
    }

    public function includeRating(Book $Books)
    {
        $Rating=$Books->saga()->first();

       return $this->item($Rating,new RatingTransformer);   
    }

    public function includeAuthor(Book $Books)
    {
        $Author=$Books->author()->first();
        return $this->item($Author,new BookAuthorTransformer);   
    }


}
