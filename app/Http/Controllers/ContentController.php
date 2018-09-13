<?php

namespace App\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Events\TvTraceEvent; //Agrega el Evento 
use App\Events\RadioTraceEvent; //Agrega el Evento 
use Auth;//Agrega el facade de Auth para acceder al id


use App\Megazines;
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


class ContentController extends Controller
{

//------------------------------------------MUSICA------------------------------------------------------//
    public function ShowMusic()
    {
        $MusicAuthors = music_authors::where('status','=','Aprobado')->get();
        $Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->get();
        $Albums = Albums::where('status','=','Aprobado')->take(6)->get();


        return view('contents.music')->with('MusicAuthors',$MusicAuthors)->with('Singles',$Singles)->with('Albums',$Albums);
    }

    public function ShowArtist($id)
    {
        $Artist= music_authors::find($id);

        $Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->where('autors_id','=',$id)->get();

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
        $Artist=music_authors::where('name','=',$request->seach)->get();

        foreach ($Artist as $key) {

            $prueba=$this->ShowArtist($key->id);
        }

        return $prueba;
    }

    public function seachArtist(){
        $query=Input::get('term');
        $Artist=music_authors::where('name','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Artist as $key) {

            $data[]=['id' => $key->id, 'value' => $key->name];
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
        $Books= Book::where('status','=','Aprobado')->paginate(9);


        return view('contents.Readings')->with('Books',$Books);
    }

    public function ShowReadingsMegazines()
    {
        $Megazines= Megazines::where('status','=','Aprobado')->get();

        return view('contents.Megazines')->with('Megazines',$Megazines);
    }

    public function seachAuthor(){
        $query=Input::get('term');
        $Author=BookAuthor::where('full_name','LIKE','%'.$query.'%')->get();
        // $book=Book::where('title','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Author as $key) {

            $data[]=['id' => $key->id, 'value' => $key->full_name, 'type' => 'author'];
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
    public function ShowAuthor($id)
    {
        $Author= BookAuthor::find($id);

        $Books = Book::where('status','=','Aprobado')->where('author_id','=',$id)->get();


        if ($Books->count()==0)
        {
            $Books=NULL;
        }
        return view('contents.AuthorProfile')->with('Author',$Author)->with('Books',$Books);
    }

    public function ShowProfileAuthor(Request $request)
    {
        $Artist=BookAuthor::where('full_name','=',$request->seach)->get();

        foreach ($Artist as $key) {

            $prueba=$this->ShowAuthor($key->id);
        }

        return $prueba;
    }
//-------------------------------------------RADIO---------------------------------------
    public function ShowRadio(){
        $Radio= Radio::where('status','=','Aprobado')->paginate(10);
        return view('contents.ShowRadios')->with('Radio',$Radio);
    }

    public function ListenRadio($id){
        $Rad= Radio::where('id','=',$id)->get();
        $Radio= Radio::where('status','=','Aprobado')->paginate(8);
        event(new RadioTraceEvent($id,Auth::user()->id));//Llama al evento asi y pasale el id del contenido y el id del usuario y listo se queda registrado
        return view('contents.listenRadio')->with('Rad',$Rad)->with('Radio',$Radio);
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
        $Movie= Movie::where('status','=','Aprobado')->get();

        if ($Movie->count()==0)
        {
            $Movie=NULL;
        }
        return view('contents.Movies')->with('Movie',$Movie);
    }

    public function seachMovie(){
        $query=Input::get('term');
        $Movie=Movie::where('title','LIKE','%'.$query.'%')->get();

        $data=array();

        foreach ($Movie as $key) {

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
    public function MovieList($id){
        $Movie= Movie::where('id','=',$id)->get();
        return view('contents.ShowMovies')->with('Movie',$Movie);
    }

    public function ShowMovieSeach(Request $request){
        $Movie= Movie::where('title','=',$request->seach)->get();
        foreach ($Movie as $key) {
            $prueba=$this->MovieList($key->id);
        }
        return $prueba;
    }
}
