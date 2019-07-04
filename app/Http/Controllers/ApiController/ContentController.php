<?php

namespace App\Http\Controllers\ApiController;

use App\Serie;
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
use App\Transformers\MovieTransformer;
use App\Transformers\EpisodeTransformer;

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
use App\RadiosTrace;
use App\TvTrace;
use App\MoviesTrace;
use App\MegazineTrace;
use App\BooksTrace;
use App\SongsTrace;
use App\EpisodeTrace;
use App\Episode;
use App\AlbumsTrace;

class ContentController extends Controller
{

    public function billboard() {
        $user = User::find(auth()->user()->id);

        $singles = Songs::latest()->whereNull('album')->where('status','Aprobado')->take(3)->get();
        $singlesAdd = User::contenidos_add($user,'song_id');

        $albums = Albums::latest()->where('status','Aprobado')->take(3)->get();
        $albumsAdd = User::contenidos_add($user,'album_id');

        $movies = Movie::latest()->where('status','Aprobado')->take(3)->get();
        $moviesAdd = User::contenidos_add($user,'movies_id');

        $series = Serie::latest()->where('status','Aprobado')->take(3)->get();
        $seriesAdd = User::contenidos_add($user,'series_id');

        $megazines = Megazines::latest()->where('status','Aprobado')->take(3)->get();
        $megazinesAdd = User::contenidos_add($user,'megazines_id');

        $books = Book::latest()->where('status','Aprobado')->take(3)->get();
        $booksAdd = User::contenidos_add($user,'books_id');

        $radios = Radio::latest()->where('status','Aprobado')->take(6)->get();
        $tvs = Tv::latest()->where('status','Aprobado')->take(6)->get();

        $music = [];
        foreach ($albums as $a) {
            $add = (in_array($a->id,$albumsAdd)) ? true : false;
            $music[] = [
                'id' => $a->id,
                'title' => $a->name_alb,
                'cover' => $a->cover,
                'acquired' => $add,
                'type' => 'Album'
            ];
        }
        foreach ($singles as $s) {
            if ($s->cover!=null) {
                $cover = $s->cover;
            } else {
                $author = music_authors::find($s->autors_id);
                $cover = $author->photo;
            }
            $add = (in_array($s->id,$singlesAdd)) ? true : false;
            $music[] = [
                'id' => $s->id,
                'title' => $s->song_name,
                'cover' => $cover,
                'acquired' => $add,
                'type' => 'Single'
            ];
        }
        $movie = [];
        foreach ($movies as $m) {
            $add = (in_array($m->id,$moviesAdd)) ? true : false;
            $movie[] = [
                'id' => $m->id,
                'title' => $m->title,
                'cover' => '/movie/poster/'.$m->img_poster,
                'acquired' => $add,
                'type' => 'Movie',
            ];
        }
        foreach ($series as $s) {
            $add = (in_array($s->id,$seriesAdd)) ? true : false;
            $movie[] = [
                'id' => $s->id,
                'title' => $s->title,
                'cover' => $s->img_poster,
                'acquired' => $add,
                'type' => 'Serie',
            ];
        }
        $reading = [];
        foreach ($books as $b) {
            $add = (in_array($b->id,$booksAdd)) ? true : false;
            $reading[] = [
                'id' => $b->id,
                'title' => $b->title,
                'cover' => "/images/bookcover/".$b->cover,
                'acquired' => $add,
                'type' => 'Book',
            ];
        }
        foreach ($megazines as $m) {
            $add = (in_array($m->id,$megazinesAdd)) ? true : false;
            $reading[] = [
                'id' => $m->id,
                'title' => $m->title,
                'cover' => $m->cover,
                'acquired' => $add,
                'type' => 'Magazine',
            ];
        }
        $radio = [];
        foreach ($radios as $r) {
            $radio[] = [
                'id' => $r->id,
                'title' => $r->name_r,
                'cover' => $r->logo,
                'type' => 'Radio'
            ];
        }
        $tv = [];
        foreach ($tvs as $t) {
            $tv[] = [
                'id' => $t->id,
                'title' => $t->name_r,
                'cover' => $t->logo,
                'type' => 'Tv'
            ];
        }
        $data = [
            'music' => $music,
            'movies' => $movie,
            'reading' => $reading,
            'radios' => $radio,
            'tvs' => $tv
        ];
        return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
    }
   
    
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
        /*
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
        */
        $radios = Radio::where('status','Aprobado')->get();
        $radio = [];
        foreach ($radios as $r) {
            $radio[] = [
                'id' => $r->id,
                'title' => $r->name_r,
                'cover' => $r->logo,
                'type' => 'Radio'
            ];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$radio],200);
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
        /*
        $Radio= Radio::findOrFail($id);

                    if ($Radio == NULL) { 
                                return Response::json(['status'=>'Esta Vacio'], 204);
                                    }

            $Json = Fractal::create()
                           ->item($Radio)
                           ->transformWith(new RadioTransformer)                
                           ->toArray();          

        return Response::json($Json);
        */
        $radio = Radio::where('id',$id)->where('status','Aprobado')->get();
        if ($radio->count()!=0) {
            event(new RadioTraceEvent(auth()->user()->id,$id));
            foreach ($radio as $r){
                $radio = [
                    'id' => $r->id,
                    'title' => $r->name_r,
                    'cover' => $r->logo,
                    'streaming' => $r->streaming,
                    'youtube' => $r->google,
                    'instagram' => $r->instagram,
                    'facebook' => $r->facebook,
                    'twitter' => $r->twitter,
                    'type' => 'Radio'
                ];
            }
        } else {
            $radio = [];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$radio],200);
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
//-------------------------RUTAS DE CONTENIDO DESTACADO--------------------------------
    public function contenidoDestacado() {
      $contenidoDestacado = [];
      $radios = RadiosTrace::all()->groupBy('radio_id');
      if (!$radios->isEmpty()) {
        foreach($radios as $key => $source) {
          $radio[$key] = $source->count();
        }
        $idRadioDestacada = array_search(max($radio), $radio);
        $radioDestacada = Radio::find($idRadioDestacada);
        $radioDestacadaR = [
          'id' => $radioDestacada->id,
          'nombre' => $radioDestacada->name_r,
          'portada' => $radioDestacada->logo,
          'tipoContenido' => "Radio"
        ];
        array_push($contenidoDestacado, $radioDestacadaR);
      }

      $tvs = TvTrace::all()->groupBy('tv_id');
      if (!$tvs->isEmpty()) {
        foreach ($tvs as $key => $source) {
          $tv[$key] = $source->count();
        }
        $idTvDestacada = array_search(max($tv), $tv);
        $tvDestacada = Tv::find($idTvDestacada);
        $tvDestacadaR = [
          'id' => $tvDestacada->id,
          'nombre' => $tvDestacada->name_r,
          'portada' => $tvDestacada->logo,
          'tipoContenido' => "TV"
        ];
        array_push($contenidoDestacado, $tvDestacadaR);
      }

      $libros = BooksTrace::all()->groupBy('books_id');
      if (!$libros->isEmpty()) {
        foreach ($libros as $key => $source) {
          $libro[$key] = $source->count();
        }
        $idLibroDestacado = array_search(max($libro), $libro);
        $libroDestacado = Book::find($idLibroDestacado);
        $libroDestacadoR = [
          'id' => $libroDestacado->id,
          'nombre' => $libroDestacado->title,
          'portada' => $libroDestacado->cover,
          'tipoContenido' => "Libro"
        ];
        array_push($contenidoDestacado, $libroDestacadoR);
      }

      $revistaDestacadaR = "";
      $revista = MegazineTrace::all()->groupBy('megazine_id');
      if (!$revista->isEmpty()) {
        foreach ($revista as $key => $source) {
          $revista[$key] = $source->count();
        }
        $idRevistaDestacada = array_search(max($revista), $revista);
        $revistaDestacada = Megazine::find($idRevistaDestacada);
        $revistaDestacadaR = [
          'id' => $revistaDestacada->id,
          'nombre' => $revistaDestacada->title,
          'portada' => $revistaDestacada->cover,
          'tipoContenido' => "Revista"
        ];
        array_push($contenidoDestacado, $revistaDestacadaR);
      }

      $peliculaDestacadaR = "";
      $pelicula = MoviesTrace::all()->groupBy('movies_id');
      if (!$pelicula->isEmpty()) {
        foreach ($pelicula as $key => $source) {
          $pelicula[$key] = $source->count();
        }
        $idPeliculaDestacada = array_search(max($pelicula), $pelicula);
        $peliculaDestacada = Movie::find($idPeliculaDestacada);
        $peliculaDestacadaR = [
          'id' => $peliculaDestacada->id,
          'nombre' => $peliculaDestacada->title,
          'portada' => $peliculaDestacada->img_poster,
          'tipoContenido' => "Película"
        ];
        array_push($contenidoDestacado, $peliculaDestacadaR);
      }

      $cancionDestacadaR = "";
      $cancion = SongsTrace::all()->groupBy('songs_id');
      if (!$cancion->isEmpty()) {
        foreach ($cancion as $key => $source) {
          $cancion[$key] = $source->count();
        }
        $idCancionDestacada = array_search(max($cancion), $cancion);
        $cancionDestacada = Songs::find($idCancionDestacada);
        $cancionDestacadaR = [
          'id' => $cancionDestacada->id,
          'nombre' => $cancionDestacada->song_name,
          'portada' => "",
          'tipoContenido' => "Canción"
        ];
        array_push($contenidoDestacado, $cancionDestacadaR);
      }

      $episodioDestacadoR = "";
      $episodio = EpisodeTrace::all()->groupBy('episodes_id');
      if (!$episodio->isEmpty()) {
        foreach ($episodio as $key => $source) {
          $episodio[$key] = $source->count();
        }
        $idEpisodioDestacado = array_search(max($episodio), $episodio);
        $episodioDestacado = Episode::find($idEpisodioDestacado);
        $episodioDestacadoR = [
          'id' => $episodioDestacado->id,
          'nombre' => $episodioDestacado->episode_name,
          'portada' => "",
          'tipoContenido' => "Episodio"
        ];
        array_push($contenidoDestacado, $episodioDestacadoR);
      }

      $albumDestacadoR = "";
      $album = AlbumsTrace::all()->groupBy('albums_id');
      if (!$album->isEmpty()) {
        foreach ($album as $key => $source) {
          $album[$key] = $source->count();
        }
        $idAlbumDestacado = array_search(max($album), $album);
        $albumDestacado = Albums::find($idAlbumDestacado);
        $albumDestacadoR = [
          'id' => $albumDestacado->id,
          'nombre' => $albumDestacado->name_alb,
          'portada' => $albumDestacado->cover,
          'tipoContenido' => "Álbum"
        ];
        array_push($contenidoDestacado, $albumDestacadoR);
      
}
      if (count($contenidoDestacado)==0) {
        $contenidoDestacado = ['status'=>'No hay contenido destacado',204];
      }

      return Response::json($contenidoDestacado);

    }
//-------------------------RUTAS DE CONTENIDO DESTACADO--------------------------------
    public function test() {
        return response()->json(['meta'=>['code'=>200],'data'=>['message'=>'Api con estructura de respuesta de prueba']],200);
    }
}
