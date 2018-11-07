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
        //$radios = Radio::orderBy('id','DESC')->paginate(5);
        $radios = Radio::where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        $radios->each(function ($radios){
            $radios->seller;
        });

        //$tvs = Tv::all();
        $tvs = Tv::where('status','Aprobado')->orderBy('id','DESC')->take(5)->get();
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

        $iRadios = 0;
        $iTvs = 0;

        return view('welcome')
            ->with('iRadios',$iRadios)
            ->with('iTvs',$iTvs)
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

    public function indexRadio() {
        //$radios = Radio::where('status','Aprobado')->take(5)->get();
        $radios = Radio::where('status','Aprobado')->orderBy('id','DESC')->take(5)->get();
        return response()->json($radios);
    }
    public function indexTv() {
        //$tvs = Tv::where('status','Aprobado')->take(5)->get();
        $tvs = Tv::where('status','Aprobado')->orderBy('id','DESC')->take(5)->get();
        return response()->json($tvs);
    }
}
