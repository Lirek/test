<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Seller;
use App\Sagas;
use App\Rating;
use App\Tags;
use Laracasts\Flash\Flash;
use File;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'DESC')->get();
        $movies->each(function ($movies) {
            $movies->saga;
            $movies->rating;
            $movies->tags_movie;
        });

       //dd($movies);

        return view('seller.movie.index')->with('movie',$movies);
    }

    public function create()
    {
        $rating = Rating::orderBy('id', 'ASC')->pluck('r_name', 'id');
        $sagas = Sagas::where('type_saga','Peliculas')->orderBy('id', 'ASC')->pluck('sag_name', 'id');
        $tags = Tags::where('status','Aprobado')->where('type_tags','Peliculas')->get();

        return view('seller.movie.create')
            ->with('ratin', $rating)
            ->with('saga', $sagas)
            ->with('tags',$tags);
    }

    public function store(Request $request) {

        //dd($request->all());
        $file = $request->file('img_poster');
        $name = 'poster_'.time().'.'.$file->getClientOriginalExtension();
        $path1 = public_path().'/movie/poster/';
        $file->move($path1, $name);

        $files = $request->file('duration');
        $names = $request->title.'_'.time().'.'.$files->getClientOriginalExtension();
        $path2 = public_path().'/movie/film';
        $files->move($path2, $names);

        $movie = new Movie($request->all());

        $movie->img_poster = $name;
        $movie->duration = $names;
        $movie->status = 2;

        $movie->save();

        $movie->tags_movie()->attach($request->tags);

        Flash::success('Se ha registrado '.$movie->title.' de forma sastisfactoria')->important();
        return redirect()->route('movies.index');
    }

    public function edit($id)
    {
        $movies = Movie::find($id);

        if (\Auth::guard('web_seller')->user()->id === $movies->seller_id) {

            $movies->rating;
            $movies->saga;
            $rating = Rating::orderBy('id', 'ASC')->pluck('r_name', 'id');
            $sagas = Sagas::where('type_saga','Peliculas')->orderBy('id', 'ASC')->pluck('sag_name', 'id');
            $tags = Tags::where('type_tags','Peliculas')->where('status','Aprobado')->get();
            $selected = $movies->tags_movie()->get();

            return view('seller.movie.edit')
                ->with('ratin', $rating)
                ->with('saga', $sagas)
                ->with('movie', $movies)
                ->with('tags', $tags)
                ->with('s_tags', $selected);

        } else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('movies.index');

        }
    }
    public function update(Request $request,$id)
    {
        //dd($request->country);    
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
        //$movie->story = $request->story;
        if ($request->country<>null) {
            $movie->country = $request->country;
        } 
        $movie->based_on = $request->based_on;
        if ($request->duration <> null) {
            $files = $request->file('duration');
            $names = $request->title . '_' . time() . '.' . $files->getClientOriginalExtension();
            $path2 = public_path() . '/movie/film';
            $files->move($path2, $names);
            $movie->duration = $names;
        }
        if($request->rating_id != null)
        {
        $movie->rating_id = $request->rating_id;
        }
        $movie->cost = $request->cost;
        $movie->trailer_url = $request->trailer_url;

        if ($request->tags!=null) {
            $tags = $request->tags;
            $movie->tags_movie()->detach();
            foreach($tags as $tag) {
                $movie->tags_movie()->attach($tag);
            }
        }

        $movie->save();

        Flash::success('Se ha modificado '.$movie->title.' de forma exitosa')->important();

        return redirect()->route('movies.index');
    }


    public function show($id)
    {
        $movies = Movie::find($id);
        $movies->each(function ($movies) {
            $movies->saga;
            $movies->rating;
            $movies->tags_movie;
        });
        return view('seller.movie.show')->with('movie',$movies);
    }

    public function destroy($id) {
        
        $pelicula = Movie::find($id);
        if (\Auth::guard('web_seller')->user()->id === $pelicula->seller_id) {

            File::delete(public_path()."/movie/film/".$pelicula->duration);
            File::delete(public_path()."/movie/poster/".$pelicula->img_poster);
            $pelicula->tags_movie()->detach();
            $pelicula->delete();
            Flash::success('Se ha eliminado la película con exito')->important();
            return redirect()->route('movies.index');

        } else {

            Flash::error('No tienes los permisos necesarios para acceder')->important();
            return redirect()->route('movies.index');
        }

    }
}
