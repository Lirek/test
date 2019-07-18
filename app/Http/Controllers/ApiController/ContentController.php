<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;

use App\Events\AlbumTraceEvent;
use App\Events\BookTraceEvent;
use App\Events\MegazineTraceEvent;
use App\Events\MovieTraceEvent;
use App\Events\SongTraceEvent;
use App\Events\TvTraceEvent;
use App\Events\RadioTraceEvent;

use App\Serie;
use App\Megazines;
use App\Albums;
use App\Songs;
use App\User;
use App\Radio;
use App\Book;
use App\Tv;
use App\Movie;
use App\music_authors;
use App\Episode;

use App\RadiosTrace;
use App\TvTrace;
use App\MoviesTrace;
use App\MegazineTrace;
use App\BooksTrace;
use App\SongsTrace;
use App\EpisodeTrace;
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

    public function AllAprovedRadios()
    {
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
        $tvs = Tv::where('status','Aprobado')->get();
        $tv = [];
        foreach ($tvs as $t) {
            $tv[] = [
                'id' => $t->id,
                'title' => $t->name_r,
                'cover' => $t->logo,
                'type' => 'Tv'
            ];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$tv],200);
    }

    public function reading()
    {
        $books = Book::where('status','Aprobado')->get();
        $booksAdd = User::contenidos_add(auth()->user(),'books_id');

        $megazines = Megazines::where('status','Aprobado')->get();
        $megazinesAdd = User::contenidos_add(auth()->user(),'megazines_id');

        $reading = [];
        foreach ($megazines as $m) {
            $add = (in_array($m->id,$megazinesAdd)) ? true : false;
            $reading[] = [
                'id' => $m->id,
                'title' => $m->title,
                'cover' => $m->cover,
                'cost' => $m->cost,
                'acquired' => $add,
                'type' => 'Magazine',
            ];
        }
        foreach ($books as $b) {
            $add = (in_array($b->id,$booksAdd)) ? true : false;
            $reading[] = [
                'id' => $b->id,
                'title' => $b->title,
                'cover' => "/images/bookcover/".$b->cover,
                'cost' => $b->cost,
                'acquired' => $add,
                'type' => 'Book',
            ];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$reading],200);
    }

    public function music()
    {
        $singles = Songs::whereNull('album')->where('status','Aprobado')->get();
        $singlesAdd = User::contenidos_add(auth()->user(),'song_id');

        $albums = Albums::where('status','Aprobado')->get();
        $albumsAdd = User::contenidos_add(auth()->user(),'album_id');

        $music = [];
        foreach ($albums as $a) {
            $add = (in_array($a->id,$albumsAdd)) ? true : false;
            $music[] = [
                'id' => $a->id,
                'title' => $a->name_alb,
                'cover' => $a->cover,
                'author' => $a->seller->name,
                'cost' => $a->cost,
                'acquired' => $add,
                'type' => 'Album'
            ];
        }
        foreach ($singles as $s) {
            if ($s->cover!=null) {
                $cover = $s->cover;
            } else {
                $cover = $s->autors->photo;
            }
            $add = (in_array($s->id,$singlesAdd)) ? true : false;
            $music[] = [
                'id' => $s->id,
                'title' => $s->song_name,
                'cover' => $cover,
                'author' => $s->autors->name,
                'cost' => $s->cost,
                'acquired' => $add,
                'type' => 'Single'
            ];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$music],200);
    }

    public function movies()
    {
        $movies = Movie::where('status','Aprobado')->get();
        $moviesAdd = User::contenidos_add(auth()->user(),'movies_id');

        $series = Serie::where('status','Aprobado')->get();
        $seriesAdd = User::contenidos_add(auth()->user(),'series_id');
        $movie = [];
        foreach ($movies as $m) {
            $add = (in_array($m->id,$moviesAdd)) ? true : false;
            $movie[] = [
                'id' => $m->id,
                'title' => $m->title,
                'author' => $m->seller->name,
                'cover' => '/movie/poster/'.$m->img_poster,
                'cost' => $m->cost,
                'acquired' => $add,
                'type' => 'Movie',
            ];
        }
        foreach ($series as $s) {
            $add = (in_array($s->id,$seriesAdd)) ? true : false;
            $movie[] = [
                'id' => $s->id,
                'title' => $s->title,
                'author' => $m->seller->name,
                'cover' => $s->img_poster,
                'cost' => $s->cost,
                'acquired' => $add,
                'type' => 'Serie',
            ];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$movie],200);
    }

//-----------------------------------------------------------------------------------------

//---------------------Contenido Individual------------------------------------------------
    public function Single($id)
    {
        $single = Songs::where('id',$id)->whereNull('album')->where('status','Aprobado')->get();
        $songs = [];
        if ($single->count()!=0) {
            event(new SongTraceEvent(auth()->user()->id,$id));
            $singlesAdd = User::contenidos_add(auth()->user(),'song_id');
            foreach ($single as $s) {
                $add = (in_array($s->id,$singlesAdd)) ? true : false;
                if ($s->cover!=null) {
                    $cover = $s->cover;
                } else {
                    $cover = $s->autors->photo;
                }
                $categoria = [];
                foreach ($s->tags as $tags) {
                    $categoria[] = [
                        'name' => $tags->tags_name
                    ];
                }
                $songs = [
                    'id' => $s->id,
                    'song_name' => $s->song_name,
                    'song_file' => $s->song_file,
                    'cover' => $cover,
                    'author' => $s->autors->name,
                    'cost' => $s->cost,
                    'acquired' => $add,
                    'category' => $categoria
                ];
            }
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$songs],200);
    }

    public function Album($id)
    {
        $album = Albums::where('id',$id)->where('status','Aprobado')->get();
        $albums = [];
        if ($album->count()!=0) {
            event(new AlbumTraceEvent(auth()->user()->id, $id));
            $singlesAdd = User::contenidos_add(auth()->user(),'song_id');
            $albumsAdd = User::contenidos_add(auth()->user(),'album_id');
            $songs = [];
            foreach ($album as $a) {
                foreach ($a->songs as $song) {
                    $add = (in_array($song->id,$singlesAdd)) ? true : false;
                    $songs[] = [
                        'id' => $song->id,
                        'song_name' => $song->song_name,
                        'song_file' => $song->song_file,
                        'cost' => $song->cost,
                        'acquired' => $add
                    ];
                }
                $add = (in_array($a->id,$albumsAdd)) ? true : false;
                $albums = [
                    'id' => $a->id,
                    'title' => $a->name_alb,
                    'cover' => $a->cover,
                    'author' => $a->seller->name,
                    'cost' => $a->cost,
                    'acquired' => $add,
                    'songs' => $songs
                ];
            }
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$albums],200);
    }

    public function Megazine($id)
    {
        $megazines = Megazines::where('id',$id)->where('status','Aprobado')->get();
        if ($megazines->count()!=0) {
            event(new MegazineTraceEvent(auth()->user()->id,$id));
            $megazinesAdd = User::contenidos_add(auth()->user(), 'megazines_id');
            foreach ($megazines as $m) {
                $add = (in_array($m->id, $megazinesAdd)) ? true : false;
                if ($m->saga_id != null) {
                    $chain = $m->sagas->sag_name;
                } else {
                    $chain = 'Independiente';
                }
                $category = [];
                foreach ($m->tags_megazines as $cat) {
                    $category[] = [
                        'name' => $cat->tags_name
                    ];
                }
                $reading = [
                    'id' => $m->id,
                    'title' => $m->title,
                    'cover' => $m->cover,
                    'megazine_file' => $m->megazine_file,
                    'author' => $m->Seller->name,
                    'category' => $m->Rating->r_name,
                    'chain_publication' => $chain,
                    'category' => $category,
                    'cost' => $m->cost,
                    'acquired' => $add
                ];
            }
        } else {
            $reading = [];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$reading],200);
    }

    public function Book($id)
    {
        $book = Book::where('id',$id)->where('status','Aprobado')->get();
        if ($book->count()!=0) {
            event(new BookTraceEvent(auth()->user()->id,$id));
            $booksAdd = User::contenidos_add(auth()->user(),'books_id');
            foreach ($book as $b){
                $add = (in_array($b->id,$booksAdd)) ? true : false;
                if ($b->saga_id!=null) {
                    $saga = [
                        'name' => $b->saga->sag_name,
                        'before' => $b->before,
                        'after' => $b->after
                    ];
                } else {
                    $saga = [];
                }
                foreach ($b->tags_book as $cat) {
                    $category[] = [
                        'name' => $cat->tags_name
                    ];
                }
                $book = [
                    'id' => $b->id,
                    'title' => $b->title,
                    'author' => $b->seller->name, // seller o author?
                    'category' => $category,
                    'sinopsis' => $b->sinopsis,
                    'cover' => "/images/bookcover/".$b->cover,
                    'book_file' => "/book/".$b->books_file,
                    'saga' => $saga,
                    'release_year' => $b->release_year,
                    'cost' => $b->cost,
                    'acquired' => $add,
                ];
            }
        } else {
            $book = [];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$book],200);
    }

    public function Radio($id)
    {
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
                    'web' => $r->web
                ];
            }
        } else {
            $radio = [];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$radio],200);
    }

    public function Tv($id)
    {
        $tv = Tv::where('id',$id)->where('status','Aprobado')->get();
        if ($tv->count()!=0) {
            event(new TvTraceEvent(auth()->user()->id,$id));
            foreach ($tv as $t) {
                $tv = [
                    'id' => $t->id,
                    'title' => $t->name_r,
                    'cover' => $t->logo,
                    'streaming' => $t->streaming,
                    'youtube' => $t->google,
                    'instagram' => $t->instagram,
                    'facebook' => $t->facebook,
                    'twitter' => $t->twitter,
                    'web' => $t->web
                ];
            }
        } else {
            $tv = [];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$tv],200);
    }

    public function movie($id)
    {
        $movies = Movie::where('id',$id)->where('status','Aprobado')->get();
        $movie = [];
        if ($movies->count()!=0) {
            event(new MovieTraceEvent(auth()->user()->id,$id));
            $moviesAdd = User::contenidos_add(auth()->user(),'movies_id');
            foreach ($movies as $m) {
                $add = (in_array($m->id,$moviesAdd)) ? true : false;
                if ($m->saga_id!=null) {
                    $saga = $m->saga->sag_name;
                } else {
                    $saga = "No pertenece a una saga";
                }
                $movie = [
                    'id' => $m->id,
                    'title' => $m->title,
                    'cover' => '/movie/poster/'.$m->img_poster,
                    'trailer' => $m->trailer_url,
                    'file' => $m->duration,
                    'sinopsis' => $m->based_on,
                    'saga' => $saga,
                    'category' => $m->rating->r_name,
                    'cost' => $m->cost,
                    'acquired' => $add
                ];
            }
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$movie],200);
    }

    public function serie($id)
    {
        $series = Serie::where('id',$id)->where('status','Aprobado')->get();
        $serie = [];
        if ($series->count()!=0) {
            $seriesAdd = User::contenidos_add(auth()->user(),'series_id');
            $episodes = [];
            foreach ($series as $s) {
                if ($s->Episode()) {
                    foreach ($s->Episode as $episode) {
                        if($episode->status =='Aprobado') {
                            $episodeAdd = User::contenidos_add(auth()->user(),'episodes_id');
                            $add = (in_array($s->id,$episodeAdd)) ? true : false;
                            $episodes[] = [
                                'id' => $episode->id,
                                'title' => $episode->episode_name,
                                'trailer' => $episode->trailer_url,
                                'file' => $episode->episode_file,
                                'sinopsis' => $episode->sinopsis,
                                'cost' => $episode->cost,
                                'acquired' => $add
                            ];
                        }
                    }
                }
                if ($s->saga_id!=null) {
                    $saga = $s->saga->sag_name;
                } else {
                    $saga = "No pertenece a una saga";
                }
                $categoria = [];
                foreach ($s->tags_serie as $tags) {
                    $categoria [] = [
                        'name' => $tags->tags_name
                    ];
                }
                $add = (in_array($s->id,$seriesAdd)) ? true : false;
                $serie = [
                    'id' => $s->id,
                    'title' => $s->title,
                    'cover' => $s->img_poster,
                    'trailer' => $s->trailer,
                    'sinopsis' => $s->story,
                    'cost' => $s->cost,
                    'saga' => $saga,
                    'acquired' => $add,
                    'category' => $categoria,
                    'episode' => $episodes
                ];
            }
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$serie],200);
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
