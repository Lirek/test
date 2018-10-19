<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Series_tag;
use App\Sagas;
use App\Rating;
use App\Episode;
use App\Tags;
use Laracasts\Flash\Flash;
use File;

class SeriesController extends Controller
{
    public function index() {

        $serie = Serie::orderBy('id','DESC')->get();
        $serie->each(function($serie){
            $serie->episode;
            $serie->seller;
            $serie->saga;
            $serie->tags_serie;
        });
        return view('seller.serie.index')->with('serie',$serie);
    }

    public function create() {

        $rating = Rating::orderBy('id', 'ASC')->pluck('r_name', 'id');
        $sagas = Sagas::where('type_saga','Series')->orderBy('id', 'ASC')->pluck('sag_name', 'id');
        $tags = Tags::where('status','Aprobado')->where('type_tags','Peliculas')->get();

        return view('seller.serie.create')
                    ->with('ratin', $rating)
                    ->with('saga', $sagas)
                    ->with('tags', $tags);
    }

    public function store(Request $request) {
        //dd($request->saga_id);
        $seller_id = $request->seller_id;
        $store_path = public_path().'/Serie/'.$request->title;
        $name = 'seriecover_'.$request->title.time().'.'.$request->file('img_poster')->getClientOriginalExtension();
        $request->file('img_poster')->move($store_path, $name);

        list($e,$real_path) = explode(public_path(),$store_path);
        $path = $real_path .'/'.$name;

        $i = 0;
        $status = 2;

        foreach ($request->episodio_file as $episodio) {
            $cost = $request->episodio_cost[$i];
            $sinopsis = $request->sinopsis[$i];
            $trailer = $request->trailerEpisodio[$i];
            $name = $request->episodio_name[$i];

            $save[] = $this->SaveEpisode($seller_id,$cost,$sinopsis,$episodio,$status,$store_path,$trailer,$name);

            $i++;
        }

        $cost = $request->cost;
        $serie = new Serie;
        $serie->seller_id   = $request->seller_id;
        if ($request->saga_id != null)
        {
            $serie->saga_id     = $request->saga_id;
            $serie->before      = $request->before;
            $serie->after       = $request->after;
        }else{
            $serie->saga_id     = null;
        }
        $serie->cost        = $cost;
        $serie->trailer     = $request->trailer;
        $serie->status      = $status;
        $serie->status_series = $request->status_series;
        $serie->title       = $request->title;
        $serie->img_poster  = $path;
        $serie->story       = $request->story;
        $serie->release_year= $request->release_year;
        $serie->save();

        $serie->tags_serie()->attach($request->tags);

        foreach ($save as $data ) {
            $serie->Episode()->save($data);
        }

        Flash::success('Se ha registrado '.$serie->title.' con un costo de '.$serie->cost)->important();

        return redirect()->action(
            'SeriesController@index'
        );

    }

    public function SaveEpisode($seller_id,$cost,$sinopsis,$episodio,$status,$store_path,$trailer,$name) {

        $name1 = 'episode_'.$name.time().'.'.$episodio->getClientOriginalExtension();

        list($e,$real_path)=explode(public_path(),$store_path);
        $path = $real_path .'/'.$name1;
        $file = $episodio->move($store_path, $name1);

        $serieEpisodes = new Episode;
        $serieEpisodes->seller_id   = $seller_id;
        $serieEpisodes->cost        = $cost;
        $serieEpisodes->episode_name= $name;
        $serieEpisodes->sinopsis    = $sinopsis;
        $serieEpisodes->episode_file= $path;
        $serieEpisodes->status      = $status;
        $serieEpisodes->trailer_url = $trailer;
        //$serieEpisodes->save();

        return($serieEpisodes);
    }

    public function show($id) {
        
        $serie = Serie::find($id);
        $episodes = $serie->Episode()->get();
        $tags = $serie->tags_serie()->get();
        return view('seller.serie.show')->with('serie',$serie)->with('episodes',$episodes)->with('tags',$tags);
    }

    public function showEpisode($idE,$idS) {
        $episode = Episode::find($idE);
        return view('seller.serie.showEpisode')->with('episode',$episode)->with('idSerie',$idS);
    }

    public function edit($id) {
        $serie = Serie::find($id);
        $episodes = $serie->Episode()->get();
        $saga = $serie->Saga()->get();
        $sagas = Sagas::where('type_saga','Series')->orderBy('id', 'ASC')->pluck('sag_name', 'id');
        $tags = Tags::where('type_tags','Peliculas')->where('status','Aprobado')->get();
        $selected = $serie->tags_serie()->get();

        $status = array(
                        1   => 'En Emision',
                        2   => 'Finalizado'
                    );
        $s = array_search($serie->status_series,$status);
        return view('seller.serie.edit')
                ->with('serie',$serie)
                ->with('episodes',$episodes)
                ->with('sagas',$sagas)
                ->with('saga',$saga)
                ->with('s',$s)
                ->with('tags',$tags)
                ->with('s_tags',$selected);
    }

    public function update(Request $request) {

        //dd($request->all());
        //dd($request->episodio_file[0]->getClientOriginalExtension());
        $serie = Serie::find($request->serieId);
        //rename(public_path().'/Serie/'.$serie->title,public_path().'/Serie/'.$request->title);
        $store_path = public_path().'/Serie/'.$serie->title;

        if ($request->img_poster!=null) {
            //unlink(public_path().$serie->img_poster);

            //$store_path = public_path().'/Serie/'.$serie->title;

            $name = 'seriecover_'.$serie->title.time().'.'.$request->file('img_poster')->getClientOriginalExtension();

            list($e,$real_path)=explode(public_path(),$store_path);
            $path = $real_path .'/'.$name;
            $request->file('img_poster')->move($store_path, $name);

            $serie->img_poster = $path;
        }

        $serie->title           = $request->title;
        $serie->status_series   = $request->status_series;
        $serie->cost            = $request->cost;
        $serie->story           = $request->story;
        $serie->release_year    = $request->release_year;
        $serie->trailer         = $request->trailer;
        $serie->saga_id         = $request->saga_id;
        $serie->before          = $request->before;
        $serie->after           = $request->after;

        $status = 2;
        $x= 0;
        for ($i=0; $i < count($request->episodio_name); $i++) { 

            $serieEpisodes = Episode::find($request->episodeId[$i]);

            if ($serieEpisodes!=null) {
                /*

                if ($request->episode_file[$i]!=null) {

                    unlink(public_path().$serieEpisodes->episode_file);

                    $name1 = 'episode_'.$name.time().'.'.$request->episode_file[$i]->getClientOriginalExtension();

                    list($e,$real_path)=explode(public_path(),$store_path);
                    $path = $real_path .'/'.$name1;
                    $file = $request->episode_file[$i]->move($store_path, $name1);
                    $serieEpisodes->episode_file= $path;
                }
                */

                $serieEpisodes->seller_id   = $request->seller_id;
                $serieEpisodes->cost        = $request->episodio_cost[$i];
                $serieEpisodes->episode_name= $request->episodio_name[$i];
                $serieEpisodes->sinopsis    = $request->sinopsis[$i];
                $serieEpisodes->status      = $status;
                $serieEpisodes->trailer_url = $request->trailerEpisodio[$i];
                $serieEpisodes->save();
            } else {

                $serieEpisodes = new Episode;

                $name1 = 'episode_'.$request->episodio_name[$x].time().'.'.$request->episodio_file[$x]->getClientOriginalExtension();

                list($e,$real_path)=explode(public_path(),$store_path);
                $path = $real_path .'/'.$name1;
                $file = $request->episodio_file[$x]->move($store_path, $name1);
                $serieEpisodes->episode_file= $path;

                $serieEpisodes->seller_id   = $request->seller_id;
                $serieEpisodes->series_id   = $request->serieId;
                $serieEpisodes->cost        = $request->episodio_cost[$i];
                $serieEpisodes->episode_name= $request->episodio_name[$i];
                $serieEpisodes->sinopsis    = $request->sinopsis[$i];
                $serieEpisodes->status      = $status;
                $serieEpisodes->trailer_url = $request->trailerEpisodio[$i];
                $serieEpisodes->save();
                $x++;
            }
        }
        //$serie->Episode()->save($serieEpisodes);

        //dd($save);
        /*
        foreach ($save as $data) {
            $serie->Episode()->save($data);
        }
        */

        if ($request->tags!=null) {
            $tags = $request->tags;
            $serie->tags_serie()->detach();
            foreach($tags as $tag) {
                $serie->tags_serie()->attach($tag);
            }
        }

        $serie->save();

        Flash::success('Se ha modificado '.$serie->title.' de manera éxitosa')->important();

        return redirect()->action(
            'SeriesController@index'
        );

    }

    public function destroyEpisode($idE,$idS) {

        $serie = Serie::find($id);
        $episodios = $serie->Episode()->get();

        foreach ($episodios as $e) {
            File::delete(public_path().$e->episode_file);
            $e->delete();
        }

        File::delete(public_path().$serie->img_poster);
        $serie->delete();

        Flash::success('Se ha eliminado la serie de manera éxitosa')->important();

        return redirect()->action(
            'SeriesController@index'
        );
    }

    public function destroy($id) {
        
        $serie = Serie::find($id);
        $episodios = $serie->Episode()->get();

        foreach ($episodios as $e) {
            File::delete(public_path().$e->episode_file);
            $e->delete();
        }

        File::delete(public_path().$serie->img_poster);
        $serie->tags_serie()->detach();
        $serie->delete();

        Flash::success('Se ha eliminado la serie de manera éxitosa')->important();

        return redirect()->action(
            'SeriesController@index'
        );

    }
}
