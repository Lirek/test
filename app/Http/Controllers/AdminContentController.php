<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\SellersRoles;
use App\Promoters;
use App\PromotersRoles;
use App\Movie;
use App\Serie;
use App\PaymentSeller;
use App\Payments;

class AdminContentController extends Controller
{
  
  public function Home() {
    $albums = Albums::where('status','En Revision')->count();
    $books = Book::where('status','En Revision')->count();
    $BookAuthor = BookAuthor::where('status','En Revision')->count();
    $megazines = Megazines::where('status','En Revision')->count();
    $movies = Movie::where('status','En Proceso')->count();
    $musicAuthors = music_authors::where('status','En Proceso')->count();
    $publicationChain = Sagas::where('status','En Proceso')->where('type_saga','Revistas')->count();
    $radios = Radio::where('status','En Proceso')->count();
    $sagaBooks = Sagas::where('status','En Proceso')->where('type_saga','Libros')->count();
    $series = Serie::where('status','En Proceso')->count();
    $singles = Songs::where('status','En Revision')->where('album',0)->count();
    $tv = Tv::where('status','En Proceso')->count();
    return view('promoter.ContentModules.Content')
      ->with('megazines', $megazines)
      ->with('books', $books)
      ->with('tv', $tv)
      ->with('radios', $radios)
      ->with('singles', $singles)
      ->with('albums', $albums)
      ->with('movies', $movies)
      ->with('musicAuthors', $musicAuthors)
      ->with('BookAuthor', $BookAuthor)
      ->with('publicationChain',$publicationChain)
      ->with('sagaBooks',$sagaBooks)
      ->with('series', $series);
    }

    public function Reporte()
    {
      return view('promoter.AdminModules.Report');
    }

  public function ContentAdminGraph() {
    $AllAlbums = Albums::all()->count();
    $AllBook = Book::all()->count();
    $AllMegazines = Megazines::all()->count();
    $AllMovies = Movie::all()->count();
    $AllRadio = Radio::all()->count();
    $AllSeries = Serie::all()->count();
    $AllSongs = Songs::whereNull('album')->count();
    $AllTv = Tv::all()->count();
    $Content = array(
      $AllSongs,
      $AllAlbums,
      $AllBook,
      $AllMegazines,
      $AllMovies,
      $AllRadio,
      $AllTv,
      $AllSeries, 
    );
    return Response()->json($Content);
  }

  public function DonutGraph() {
    $PendingSongs = Songs::where('album',0)
                        ->where('status','<>','Aprobado')
                        ->count();
    $PendingAlbums = Albums::where('status','<>','Aprobado')->get()->count(); 
    $PendingMovies = Movie::where('status','<>','Aprobado')->get()->count();
    $PendingMegazines = Megazines::where('status','<>','Aprobado')->get()->count();
    $PendingBook = Book::where('status','<>','Aprobado')->get()->count();
    $PendingRadio = Radio::where('status','<>','Aprobado')->get()->count();
    $PendingTv = Tv::where('status','<>','Aprobado')->get()->count();
    $PendingSeries = Serie::where('status','<>','Aprobado')->get()->count();

    $AllPending = $PendingSeries+$PendingMovies+$PendingTv+$PendingRadio+$PendingBook+$PendingMegazines+$PendingAlbums+$PendingSongs;

    $AprovedSongs = Songs::where('album',0)
                        ->where('status','Aprobado')
                        ->count();
    $AprovedAlbums =  Albums::where('status','Aprobado')->get()->count();
    $AprovedMovies = Movie::where('status','Aprobado')->get()->count();
    $AprovedMegazines = Megazines::where('status','Aprobado')->get()->count();
    $AprovedBook = Book::where('status','Aprobado')->get()->count();
    $AprovedRadio = Radio::where('status','Aprobado')->get()->count();
    $AprovedTv = Tv::where('status','Aprobado')->get()->count();
    $AprovedSeries = Serie::where('status','Aprobado')->get()->count();

    $AllAproved = $AprovedSeries+$AprovedMovies+$AprovedTv+$AprovedRadio+$AprovedBook+$AprovedMegazines+$AprovedAlbums+$AprovedSongs;

    $Content=array(
      $AllPending,
      $AllAproved
    );
    return Response()->json($Content);       
  }

  public function TagsBarGraph() {
    $MusicTags = Tags::where('type_tags','Musica')->count();
    $MoviesTags = Tags::where('type_tags','Peliculas')->count();
    $RadiosTags = Tags::where('type_tags','Radios')->count();
    $TVTags = Tags::where('type_tags','TV')->count();
    $BooksTags = Tags::where('type_tags','Libros')->count();
    $MegazineTags = Tags::where('type_tags','Revistas')->count();
    $SeriesTags = Tags::where('type_tags','Series')->count();
    $Content=array(
      $MusicTags,
      $MoviesTags,
      $RadiosTags,
      $TVTags,
      $BooksTags,
      $MegazineTags,
      $SeriesTags,
    );
    return Response()->json($Content);  
  }

  public function TagsDountsGraph() {
    $AprovedTags = Tags::where('status','Aprobado')->count();
    $PendingTags = Tags::where('status','En Proceso')->count();
    $Content=array($PendingTags, $AprovedTags);
    return Response()->json($Content);
  }

  public function MusicianPieGraphData() {
    $AprovedMusician= music_authors::where('status','En Proceso')->count();
    $PendingMusician= music_authors::where('status','Aprobado')->count();
    $Content=array($AprovedMusician, $PendingMusician);
    return Response()->json($Content); 
  }

  public function MusicianBarrGraphData() {
    $Musician= music_authors::where('type_authors','Solista')->count();
    $Band= music_authors::where('type_authors','Agrupacion Musical')->count();
    $Content=array($Musician, $Band);
    return Response()->json($Content); 
  }

  public function pendientes() {
    $albums = Albums::where('status','En Revision')->count();
    $books = Book::where('status','En Revision')->count();
    $bookAuthor = BookAuthor::where('status','En Revision')->count();
    $megazines = Megazines::where('status','En Revision')->count();
    $movies = Movie::where('status','En Proceso')->count();
    $musicAuthors = music_authors::where('status','En Proceso')->count();
    $publicationChain = Sagas::where('status','En Proceso')->where('type_saga','Revistas')->count();
    $radios= Radio::where('status','En Proceso')->count();
    $sagaBooks = Sagas::where('status','En Proceso')->where('type_saga','Libros')->count();
    $series = Serie::where('status','En Proceso')->count();
    $singles = Songs::where('status','En Revision')->whereNull('album')->count();
    $tags = Tags::where('status','En Proceso')->count();
    $tv = Tv::where('status','En Proceso')->count();
    $contenidoPendiente = $albums+$books+$bookAuthor+$megazines+$movies+$musicAuthors+$publicationChain+$sagaBooks+$radios+$series+$singles+$tags+$tv;

    $proveedores = Seller::where('estatus','<>','Aprobado')->count();

    $pagosProveedores = PaymentSeller::where('status','Por cobrar')->orWhere('status','Diferido')->count();

    $solicitudesProveedores = ApplysSellers::where('status','En Proceso')->count();

    $solicitudesUsuarios = User::where('verify','0')
      ->where('img_doc','<>','NULL')
      ->where('num_doc','<>','NULL')
      ->where('type','<>','Indefinido')
      ->where('fech_nac','<>','NULL')
      ->count();

    $pagosUsuarios = Payments::where('status','En Revision')->count();

    $pendientes = [
      'contenido' => $contenidoPendiente,
      'proveedores' => $proveedores,
      'pagosP' => $pagosProveedores,
      'solicitudesP' => $solicitudesProveedores,
      'solicitudesU' => $solicitudesUsuarios,
      'pagosU' => $pagosUsuarios
    ];
    return response()->json($pendientes);
    
  }
}
