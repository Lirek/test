<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seller;
use App\Book;
use App\Radio;
use App\Tv;
use App\Movie;
use App\Albums;

use App\User;


class WelcomeController extends Controller
{

        public function terminosYcondiciones()
    {
        return view('terminosCondiciones');
    }

    public function leipel()
    {
        return view('queEsLeipel');
    }

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
//        $radios = Radio::all();
        $radios = Radio::orderBy('id','DESC')->paginate('10');
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

        $musica = Albums::all();
        $musica->each(function ($musica){
            $musica->Seller;
            $musica->Autors;
        });


        return view('welcome')
            ->with('seller', $sellers)
            ->with('book',$books)
            ->with('movie',$movies)
            ->with('tv',$tvs)
            ->with('radio',$radios)
            ->with('music',$musica);
    }

    public function email(Request $request){
        $email=User::where('email','=',$request->email)->first();
        

        if($email){
             return response()->json(false);  
        }else{
            return response()->json(true);
        }
    
    }

    public function emailSeller(Request $request){
        $email=Seller::where('email','=',$request->email)->first();
      

        if($email){
            return response()->json($email->email); 
        }else{
            return response()->json(1); 
        }
    
    }
}
