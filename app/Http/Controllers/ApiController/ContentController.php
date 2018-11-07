<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;

use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Transformers\AlbumsTransformer;
use App\Transformers\SongsTransformer;
use App\Transformers\MusicAuthorTransformer;
use App\Transformers\SellerTransformer;
use App\Transformers\TagsTransformer;
use App\Transformers\BooksTransformer;
use App\Transformers\MegazinesTransformer;
use App\Transformers\RadioTransformer;
use App\Transformers\TvTransformer;

use App\Events\TvTraceEvent;
use App\Events\RadioTraceEvent;
use Auth;

use Response;

use App\Megazines;
use App\Tags;
use App\ApplysSellers;
use App\Albums;
use App\Songs;
use App\User;
use App\Seller;
use App\Radio;
use App\Sagas;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\Movie;
use App\Series;

class ContentController extends Controller
{
   
    
//---------------TODO EL CONTENIDO APROBADO---------------------------------------------------
    public function AllAprovedSingles()
    {
      
        $Songs=Songs::whereNull('album')
                      ->with('Seller')
                      ->with('autors')
                                    ->where('status','=','Aprobado')
                                    ->get();
      
       if ($Songs->isEmpty()) { 
                return Response::json(['status'=>'Esta Vacio'], 204);
                  }
                    $Json = Fractal::create()
                           ->collection($Songs)
                           ->transformWith(new SongsTransformer)                  
                           ->parseIncludes(['autors','Seller','Tags'])
                           ->toArray();          

       return Response::json($Json);
    }

    public function AllAprovedAlbums()
    {
      $Albums = Albums::where('status','=','Aprobado')
                                                        ->with('Seller')
                                                        ->with('Autors')
                                                        ->with('tags_music')  
                                ->get();

      if ($Albums->isEmpty()) { 
                return Response::json(['status'=>'Esta Vacio'], 200);
                  }


      $Json = Fractal::create()
                           ->collection($Albums)
                           ->transformWith(new AlbumsTransformer)                  
                           ->parseIncludes(['songs','Autors','Seller','tags_music'])
                           ->toArray();

        return Response::json($Json);
    }

    public function AllAprovedMusicAuthors()
    {
      $MusicAuthors = music_authors::where('status','=','Aprobado')
                                                                    ->with('Seller')
                                                                    ->with('songs')
                                                                    ->with('albums')
                                                                    ->get();

      if ($MusicAuthors->isEmpty()) { 
                return Response::json(['status'=>'Esta Vacio'], 204);
                  }

      $Json = Fractal::create()
                           ->collection($MusicAuthors)
                           ->transformWith(new MusicAuthorTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);                 
    }

    public function AllAprovedRadios()
    {
      $Radio = Radio::where('status','=','Aprobado')->get();

      
      if ($Radio->isEmpty()) 
      { 
          return Response::json(['status'=>'Esta Vacio'], 204);
      }

      $Json = Fractal::create()
                           ->collection($Radio)
                           ->transformWith(new RadioTransformer)                
                           ->toArray();          

        return Response::json($Json);                 
    }

    public function AllAprovedTvs()
    {
      $Tvs = Tv::where('status','=','Aprobado')->get();

      if ($Tvs->isEmpty()) 
      { 
        return Response::json(['status'=>'Esta Vacio'], 204);
      }

      $Json = Fractal::create()
                           ->collection($Tvs)
                           ->transformWith(new TvTransformer)                
                           ->toArray();          

        return Response::json($Json);                 
    }

    public function AllAprovedBooks()
    {
      $Books= Book::where('status','=','Aprobado')
                            ->with('author')
                            ->with('seller')
                            ->get();

            if ($Books->isEmpty()) { 
                return Response::json(['status'=>'Esta Vacio'], 204);
                  }

      $Json = Fractal::create()
                           ->collection($Books)
                           ->transformWith(new BooksTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);
    }

    public function AllAprovedMegazines()
    {
      $Megazines= Megazines::where('status','=','Aprobado')
                                                            ->with('Seller')
                                                            ->with('sagas')
                                                            ->with('tags_megazines')
                                                            ->with('Rating')
                                                            ->get();

      if ($Megazines->isEmpty()) { 
                return Response::json(['status'=>'Esta Vacio'], 204);
                  }

      $Json = Fractal::create()
                           ->collection($Megazines)
                           ->transformWith(new MegazinesTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);
    }
//-----------------------------------------------------------------------------------------

//---------------------Contenido Individual------------------------------------------------
    public function Single($id)
    {
        $Songs=Songs::findOrFail($id)
                                      ->with('Seller')
                                      ->with('autors')
                                      ->get();
            
            if ($Songs==NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }
                    $Json = Fractal::create()
                           ->collection($Songs)
                           ->transformWith(new SongsTransformer)                  
                           ->parseIncludes(['autors','Seller','tags'])
                           ->toArray();          

            return Response::json($Json);
    }

    public function Megazine($id)
    {
        $Megazines= Megazines::findOrFail($id)
                                                            ->with('Seller')
                                                            ->with('sagas')
                                                            ->with('tags_megazines')
                                                            ->with('Rating')
                                                            ->get();

        if ($Megazines==NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }

            $Json = Fractal::create()
                           ->item($Megazines)
                           ->transformWith(new MegazinesTransformer)                
                           ->parseIncludes(['Seller','Sagas','Rating','Tags'])
                           ->toArray();

        return Response::json($Json);
    }

    public function Album($id)
    {
        $Albums = Albums::findOrFail($id)
                                                        ->with('Seller')
                                                        ->with('Autors')
                                                        ->with('tags_music')    
                                                        ->get();

        if ($Albums==NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }


        $Json = Fractal::create()
                           ->item($Albums)
                           ->transformWith(new AlbumsTransformer)                  
                           ->parseIncludes(['songs','Autors','Seller','tags_music'])
                           ->toArray();

        return Response::json($Json);
    }

    public function Book($id)
    {
        $Books= Book::findOrFail($id)
                                                    ->with('author')
                                                    ->with('seller')
                                                    ->get();

                    if ($Books==NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }

            $Json = Fractal::create()
                           ->item($Books)
                           ->transformWith(new BooksTransformer)                
                           ->parseIncludes(['Seller','Saga','Rating','Author'])
                           ->toArray();          

        return Response::json($Json);
    }

    public function MusicAuthor($id)
    {
        $MusicAuthor = music_authors::findOrFail($id)                     ->with('Seller')
                                                                    ->with('songs')
                                                                    ->with('albums')
                                                                    ->get();

        if ($MusicAuthor == NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }

        $Json = Fractal::create()
                           ->item($MusicAuthor)
                           ->transformWith(new MusicAuthorTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);                                   
    }

    public function Radio($id)
    {
        $Radio= Radio::findOrFail($id);

                    if ($Radio == NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }

            $Json = Fractal::create()
                           ->item($Radio)
                           ->transformWith(new RadioTransformer)                
                           ->toArray();          

        return Response::json($Json);
    }

    public function Tv($id)
    {
        $Tv= Tv::findOrFail($id);

                    if ($Tv == NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }

            $Json = Fractal::create()
                           ->item($Tv)
                           ->transformWith(new TvTransformer)                
                           ->toArray();          

        return Response::json($Json);
    }
//-----------------------------------------------------------------------------------------

//---------------------Trace de Contenidos------------------------------------------------
    
    public function SingleTrace($id)
    {
        return Response::json(['status'=>'OK'], 200);
    }

    public function MegazineTrace($id)
    {
        return Response::json(['status'=>'OK'], 200);
    }

    public function AlbumTrace($id)
    {
        return Response::json(['status'=>'OK'], 200);
    }

    public function BookTrace($id)
    {
        return Response::json(['status'=>'OK'], 200);
    }


    public function RadioTrace($id)
    {
        event(new RadioTraceEvent(auth()->user()->id,$id));
        return Response::json(['status'=>'OK'], 200);
    }

    public function TvTrace($id)
    {
        event(new TvTraceEvent(auth()->user()->id,$id));
        return Response::json(['status'=>'OK'], 200);
    }
//-----------------------------------------------------------------------------------------
}
