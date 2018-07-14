<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seller;
use App\Book;
use App\Radio;
use App\Tv;
use App\Movie;

class WelcomeController extends Controller
{
    public function welcome()
    {
//        $sellers = Seller::orderBy('id', 'DESC')->paginate('10');
        $sellers = Seller::all();
        $books = Book::all();
        $books->each(function ($books) {
            $books->author;
            $books->seller;
            $books->saga;
            $books->rating;
        });
        $radios = Radio::all();
        $radios->each(function ($radios){
            $radios->seller;
        });
        $tvs = Tv::all();
        $tvs->each(function ($tvs){
            $tvs->seller;
        });
        $movies = Movie::all();
        $movies->each(function ($movies) {
            $movies->seller;
            $movies->saga;
            $movies->rating;
        });

        return view('welcome')
            ->with('seller', $sellers)
            ->with('book',$books)
            ->with('movie',$movies)
            ->with('tv',$tvs)
            ->with('radio',$radios);
    }
}
