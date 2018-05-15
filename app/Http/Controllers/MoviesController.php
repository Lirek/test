<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Seller;
use App\Sagas;
use App\Rating;
use Laracasts\Flash\Flash;

class MoviesController extends Controller
{
    public function index()
    {
        dd('indez bb');
    }

    public function create()
    {
        $rating = Rating::orderBy('id','ASC')->pluck('r_name','id');
        $sagas = Sagas::orderBy('id','ASC')->pluck('sag_name','id');

        return view('seller.movie.create')
            ->with('ratin',$rating)
            ->with('saga',$sagas);
    }

    public function store(Request $request)
    {
        $movie = new Movie($request->all());
        dd($movie);
    }
}
