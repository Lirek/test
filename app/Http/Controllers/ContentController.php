<?php

namespace App\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Events\TvTraceEvent; //Agrega el Evento 
use App\Events\RadioTraceEvent; //Agrega el Evento 
use Auth;//Agrega el facade de Auth para acceder al id


use App\Megazines;
use App\User;
use App\Tags;
use App\Albums;
use App\Songs;
use App\Seller;
use App\Radio;
use App\Sagas;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\Transactions;
use App\Movie;
use App\Serie;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Episode;

class ContentController extends Controller
{

//------------------------------------------MUSICA------------------------------------------------------//
    public function ShowMusic()
    {
        $MusicAuthors = music_authors::where('status','Aprobado')->get();
        $Singles = Songs::where('album',null)->where('status','Aprobado')->get();
        $Album = Albums::where('status','Aprobado')->take(6)->get();

        $Albums = collect();
        foreach ($Singles as $single) {
            $Albums->push($single);
            $Albums->each(function($Albums){
                $Albums->transaction;
            });
        }
        foreach ($Album as $album){
            $Albums->push($album);
            $Albums->each(function($Albums){
                $Albums->Transactions;
            });
        }
        //dd($Albums);

        return view('contents.music')->with('MusicAuthors',$MusicAuthors)->with('Singles',$Singles)->with('Albums',$Albums->sortByDesc('created_at'));
    }

    public function ShowArtist($id)
    {
        $Artist= music_authors::find($id);

        $Singles = Songs::where('album','=',NULL)->where('status','=','Aprobado')->where('autors_id','=',$id)->get();

        $Albums = Albums::where('status','=','Aprobado')->where('autors_id','=',$id)->get();

        if ($Albums->count()==0)
        {
            $Albums=NULL;
        }

        if ($Singles->count()==0)
        {
            $Singles=NULL;
        }

        return view('contents.ArtistProfile')->with('Artist',$Artist)->with('Singles',$Singles)->with('Albums',$Albums);
    }

    public function ShowProfileArtist(Request $request)
    {
        $Art=music_authors::where('name','=',$request->seach)->first();
        
        //$Artist=$Albums->merge($Song);
        if($Art)
        {
           $Albums=Albums::where('seller_id','=',$Art->seller_id)->where('status','=','Aprobado')->get();
           $Song=Songs::where('seller_id','=',$Art->seller_id)->where('album','=',NULL)->where('status','=','Aprobado')->get();
           $Artist = collect();
            foreach ($Song as $single) {
                $Artist->push($single);
            }
            foreach ($Albums as $album){
                $Artist->push($album);
            }
            return view('contents.music')->with('Albums',$Artist);
        }
        else
        {
            $Albums=Albums::where('name_alb','=',$request->seach)->get();
        
            $Song=Songs::where('song_name','=',$request->seach)->get();
            $Artist = collect();
            foreach ($Song as $single) {
                $Artist->push($single);
            }
            foreach ($Albums as $album){
                $Artist->push($album);
            }

             return view('contents.music')->with('Albums',$Artist);
        }
    }
    public function seachArtist(){
        $query=Input::get('term');
        $Artist=music_authors::where('name','LIKE','%'.$query.'%')->get();
        $Album=Albums::where('name_alb','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();
        $Songs=Songs::where('song_name','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();

        $data=array();

        if(count($Album)>0){
            foreach ($Album as $key) {

                $data[]=['id' => $key->id, 'value' => $key->name_alb, 'type'=>'Album'];
            }
        }
        if (count($Songs)>0) {
            foreach ($Songs as $key) {
             $data[]=['id' => $key->id, 'value' => $key->song_name, 'type'=>'Single'];
            }
        }
        if (count($Artist)>0) {
            foreach ($Artist as $key) {
             $data[]=['id' => $key->id, 'value' => $key->name, 'type'=>'Artist'];
            }
        }
        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }

    public function ShowAllAlbum()
    {
        $Albums = Albums::where('status','=','Aprobado')->with('autors')->with('songs')->get();
        return Datatables::of($Albums)->make(true);
    }

    public function ShowAllSingles()
    {
        $Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->with('autors')->get();

        return Datatables::of($Singles)->make(true);

    }


//----------------------------------------LECTURA------------------------------------------------------
    public function ShowReadingsBooks()
    {
    $Books= Book::where('status','=','Aprobado')->orderBy('id', 'DESC')->get();
    $Megazines= Megazines::where('status','=','Aprobado')->orderBy('id', 'DESC')->get();

        $Lecturas = collect();
        foreach ($Books as $books) {
            $Lecturas->push($books);
            $Lecturas->each(function($Lecturas){
                $Lecturas->transaction;
            });
        }
        foreach ($Megazines as $megazines){
            $Lecturas->push($megazines);
            $Lecturas->each(function($Lecturas){
                $Lecturas->Transactions;
            });
        }

        //dd($Lecturas);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($Lecturas);
        $perPage = 12;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $Lecturas = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        return view('contents.Readings')->with('Books',$Books)->with('Megazines',$megazines)->with('Lecturas',$Lecturas);
    }

    public function ShowReadingsMegazines()
    {
        $Megazines= Megazines::where('status','=','Aprobado')->paginate(9);

        return view('contents.Megazines')->with('Megazines',$Megazines);
    }
     public function seachMegazines(){
        $query=Input::get('term');
        $Author=Megazines::where('title','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();
        // $book=Book::where('title','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Author as $key) {

            $data[]=['id' => $key->id, 'value' => $key->title, 'type' => 'titulo'];
        }
        // foreach ($book as $key1 ) {
        //     $data[]=['id' => $key1->id, 'value' => $key1->title];
        // }
        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }

    public function seachAuthor(){
        $query=Input::get('term');
        $Author=BookAuthor::where('full_name','LIKE','%'.$query.'%')->get();
        $book=Book::where('title','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();
        $megazines=Megazines::where('title','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();

        $data=array();

        foreach ($megazines as $key) {
            $data[]=['id' => $key->id, 'value' => $key->title, 'type' => 'megazines'];
        }
         foreach ($Author as $key) {

            $data[]=['id' => $key->id, 'value' => $key->full_name, 'type' => 'author'];
        }
        foreach ($book as $key1 ) {
            $data[]=['id' => $key1->id, 'value' => $key1->title, 'type'=> 'book'];
        }
        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }
    public function ShowAuthor($id)
    {
        $Author= BookAuthor::findOrfail($id);

        $Books = Book::where('status','=','Aprobado')->where('author_id','=',$id)->get();


        if ($Books->count()==0)
        {
            $Books=NULL;
        }
        return view('contents.AuthorProfile')->with('Author',$Author)->with('Books',$Books);
    }

    public function ShowProfileAuthor(Request $request)
    {
        if ($request->type=='book'){
        $Books = Book::where('status','=','Aprobado')->where('title','=',$request->seach)->paginate(1);
        return view('contents.Readings')->with('Lecturas',$Books);
        }
        elseif ($request->type=='author'){
            $Artist=BookAuthor::where('full_name','=',$request->seach)->get();
        foreach ($Artist as $key) {
            $Books = Book::where('status','=','Aprobado')->where('author_id','=',$key->id)->paginate(8);
            return view('contents.Readings')->with('Lecturas',$Books);
        }
        }elseif ($request->type=='megazines'){
        $Megazines= Megazines::where('status','=','Aprobado')->orderBy('id', 'DESC')->where('title','=',$request->seach)->paginate(8);
        return view('contents.Readings')->with('Lecturas',$Megazines);
        }
    }

    public function ShowProfileMegazine(Request $request)
    {
        $Megazines=Megazines::where('title','=',$request->seach)->where('status','=','Aprobado')->paginate(9);

        return view('contents.Megazines')->with('Megazines',$Megazines);
    }
//-------------------------------------------RADIO---------------------------------------
    public function ShowRadio(){
        $Radio= Radio::where('status','=','Aprobado')->paginate(10);
        return view('contents.ShowRadios')->with('Radio',$Radio);
    }

    public function ListenRadio($id){
        $Rad= Radio::where('id','=',$id)->get();
        $Radio= Radio::where('status','=','Aprobado')->paginate(15);
        event(new RadioTraceEvent(Auth::user()->id,$id));//Llama al evento asi y pasale el id del contenido y el id del usuario y listo se queda registrado
        return view('contents.ListenRadio')->with('Rad',$Rad)->with('Radio',$Radio);
    }

    public function ShowListenRadio(Request $request){
        $Radio= Radio::where('name_r','=',$request->seach)->get();
        foreach ($Radio as $key) {
            $prueba=$this->ListenRadio($key->id);
        }
        return $prueba;
    }

    public function seachRadio(){
        $query=Input::get('term');
        $Radio=Radio::where('name_r','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Radio as $key) {

            $data[]=['id' => $key->id, 'value' => $key->name_r];
        }

        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }
//--------------------------------------Tvs-----------------------------------------------
    public function ShowTv(){
        $Tv= Tv::where('status','=','Aprobado')->paginate(10);
        return view('contents.ShowTv')->with('Tv',$Tv);
    }
    public function PlayTv($id){
        $Tv= Tv::where('id','=',$id)->get();
        $Tvs= Tv::where('status','=','Aprobado')->paginate(8);
         event(new TvTraceEvent(Auth::user()->id,$id));
        return view('contents.playTv')->with('Tv',$Tv)->with('Tvs',$Tvs);
    }
    public function ShowPlayTv(Request $request){
        $Tv= Tv::where('name_r','=',$request->seach)->get();
        foreach ($Tv as $key) {
            $prueba=$this->PlayTv($key->id);
        }
        return $prueba;
    }

    public function seachTv(){
        $query=Input::get('term');
        $Tv=Tv::where('name_r','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Tv as $key) {

            $data[]=['id' => $key->id, 'value' => $key->name_r];
        }

        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }
//--------------------------------------MOVIES--------------------------------------------

    public function ShowMovies(){
        $Movies= Movie::where('status','=','Aprobado')->orderBy('id', 'DESC')->get();
        $Series= Serie::where('status','=','Aprobado')->orderBy('id', 'DESC')->get();
        
        $user= User::find(Auth::user()->id);
        
      #  dd($user);
        
        $MovieAdd=user::contenidos_add($user, 'movies_id');
        
      #  dd($MovieAdd);


        $Cine = collect();
        foreach ($Movies as $movie) {
          $adquirido=(in_array($movie->id, $MovieAdd)) ? true : false;

            $movie->type='movie';
            $movie->adquirido = $adquirido; 
            $Cine->push($movie);
            $Cine->each(function($Cine){
                $Cine->transaction;
            });
        }
        foreach ($Series as $serie){
            $serie->type='serie';
            $Cine->push($serie);
        }

      // dd($Cine);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($Cine);
        $perPage = 12;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $Cine = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);


        //dd($Cine);
        return view('contents.Movies')->with('Movie',$Movies)->with('Series',$Series)->with('Cine',$Cine);
    }

    public function seachMovie(){
        $query=Input::get('term');

        $Movie=Movie::where('title','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();
        $Series=Serie::where('title','LIKE','%'.$query.'%')->where('status','=','Aprobado')->get();

        $data=array();

        foreach ($Movie as $key) {

            $data[]=['id' => $key->id, 'value' => $key->title , 'type' => 'movie'];
        }

         foreach ($Series as $key) {

            $data[]=['id' => $key->id, 'value' => $key->title, 'type' => 'serie'];
        }

        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }
    public function MovieList($id){
        $Movie= Movie::where('id','=',$id)->paginate(10);
        return view('contents.ShowMovies')->with('Movie',$Movie);
    }

    public function ShowMovieSeach(Request $request){

        if ($request->type=='serie'){
                $Series = Serie::where('status','=','Aprobado')->where('title','=',$request->seach)->orderBy('id', 'DESC')->get();

                $Cine = collect();
                foreach ($Series as $series) {
                     $series->type='serie';
                     $Cine->push($series);

                }

                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $col = new Collection($Cine);
                $perPage = 12;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $Cine = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
                return view('contents.Movies')->with('Cine',$Cine);
        }
        elseif ($request->type=='movie'){
                $Movies= Movie::where('status','=','Aprobado')->where('title','=',$request->seach)->orderBy('id', 'DESC')->get();
                $Cine = collect();
                foreach ($Movies as $movies) {
                     $movies->type='movie';
                     $Cine->push($movies);
                }
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $col = new Collection($Cine);
                $perPage = 12;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $Cine = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
                return view('contents.Movies')->with('Cine',$Cine);
        }
    }


    public function PlayMovie($id){
      $movie= Movie::where('status','=','Aprobado')->where('id','=',$id)->orderBy('id', 'DESC')->get();
    #  dd($movie);
      //$movie= Movie::where('status','=','Aprobado')->paginate(8);
      return view('contents.PlayMovie')->with('movie',$movie);
    }

//--------------------------------------SERIES--------------------------------------------
    public function ShowSeries(){
        $Serie= Serie::where('status','=','Aprobado')->paginate(8);

        // if ($Serie->count()==0)
        // {
        //     $Serie=NULL;
        // }
        return view('contents.Series')->with('Serie',$Serie);
    }
    public function seachSerie(){
        $query=Input::get('term');
        $Serie=Serie::where('title','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Serie as $key) {

            $data[]=['id' => $key->id, 'value' => $key->title];
        }

        if(count($data))
        {
            return response()->json($data);
        }else
        {
            return ['value'=>'No se encuentra...','id'=>''];
        }

    }
    public function SerieList($id){
        $Serie= Serie::where('id',$id)->paginate(1);
        return view('contents.Series')->with('Serie',$Serie);
    }

    public function ShowSerieSeach(Request $request){
        $Serie= Serie::where('title','=',$request->seach)->get();
        foreach ($Serie as $key) {
            $prueba=$this->SerieList($key->id);
        }
        return $prueba;
    }


    public function PlaySerie($id){
      $serie= Serie::where('id','=',$id)->get();

      $serie= Serie::where('status','=','Aprobado')->paginate(8);

      return view('contents.PlaySerie')->with('Series',$serie);
    }

    public function PlayEpisode($id){
      $episode= Episode::where('id','=',$id)->get();

      $episode= Episode::where('status','=','Aprobado')->paginate(8);

      return view('contents.PlayEpisode')->with('Episode',$episode);
    }
}
