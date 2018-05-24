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
        $movies = Movie::orderBy('id', 'DESC')->paginate('10');
        $movies->each(function ($movies) {
            $movies->saga;
            $movies->rating;
        });

//        dd($movies);

        return view('seller.movie.index')->with('movie',$movies);
    }

    public function create()
    {
        $rating = Rating::orderBy('id', 'ASC')->pluck('r_name', 'id');
        $sagas = Sagas::orderBy('id', 'ASC')->pluck('sag_name', 'id');

        return view('seller.movie.create')
            ->with('ratin', $rating)
            ->with('saga', $sagas);
    }

    public function store(Request $request)
    {
        $file = $request->file('img_poster');
        $name = 'poster' . time() . '.' . $file->getClientOriginalExtension();
        $path1 = public_path() . '/movie/poster/';
        $file->move($path1, $name);

        $files = $request->file('duration');
        $names = 'movie' . $request->duration . '_' . time() . '.' . $files->getClientOriginalExtension();
        $path2 = public_path() . '/movie/movies';
        $files->move($path2, $names);

        $movie = new Movie($request->all());

        $movie->seller_id = \Auth::guard('web_seller')->user()->id;
        $movie->img_poster = $name;
        $movie->duration = $names;
//        dd($movie);
        $movie->save();

        Flash::info('Se ha registrado ' . $movie->title . ' de forma sastisfactoria')->important();

        return redirect()->route('movies.index');
    }

    public function edit($id)
    {
        $movies = Movie::find($id);

        if (\Auth::guard('web_seller')->user()->id === $movies->seller_id) {

            $movies->rating;
            $movies->saga;
            $rating = Rating::orderBy('id', 'ASC')->pluck('r_name', 'id');
            $sagas = Sagas::orderBy('id', 'ASC')->pluck('sag_name', 'id');

            return view('seller.movie.edit')
                ->with('ratin', $rating)
                ->with('saga', $sagas)
                ->with('movie', $movies);

        } else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('movies.index');

        }
    }
    public function update(Request $request,$id)
    {
        $movie = Movie::find($id);
        $movie->seller_id = \Auth::guard('web_seller')->user()->id;
        $movie->saga_id = $request->saga_id;
        $movie->title = $request->title;
        $movie->original_title = $request->original_title;
        if ($request->img_poster <> null) {
            $file = $request->file('img_poster');
            $name = 'poster' . time() . '.' . $file->getClientOriginalExtension();
            $path1 = public_path() . '/movie/poster/';
            $file->move($path1, $name);
            $movie->img_poster = $name;
        }
        $movie->story = $request->story;
        $movie->country = $request->country;
        $movie->based_on = $request->based_on;
        if ($request->img_poster <> null) {
            $files = $request->file('duration');
            $names = 'movie' . $request->duration . '_' . time() . '.' . $files->getClientOriginalExtension();
            $path2 = public_path() . '/movie/movies';
            $files->move($path2, $names);
            $movie->duration = $names;
        }
        $movie->rating_id = $request->rating_id;
        $movie->cost = $request->cost;
        $movie->trailer_url = $request->trailer_url;
        $movie->save();

        Flash::warning('Se ha modificado ' . $movie->title . ' de forma exitosa')->important();

        return redirect()->route('movies.index');
    }


    public function show($id)
    {
        $movies = Movie::find($id);
        $movies->each(function ($movies) {
            $movies->saga;
            $movies->rating;
        });

        return view('seller.movie.show')->with('movie',$movies);
    }
}
