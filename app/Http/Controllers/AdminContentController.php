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
use App\Series;

class AdminContentController extends Controller
{
  
  public function Home()
    {

            $albums= Albums::where('status','=','En Revision')->count();
            $singles= Songs::where('status','=','En Revision')->whereNull('album')->count();
            $radios= Radio::where('status','=','En Revision')->count();
            $tv= Radio::where('status','=','En Revision')->count();
            $books= Book::where('status','=','En Revision')->count();
            $megazines= Megazines::where('status','=','En Revision')->count();
            $tags= Tags::where('status','=','En Revision')->count();
            $movies = Movie::where('status','=','En Revision')->count();
            $series = 0;

            
            
            return view('promoter.ContentModules.Content')
            ->with('tags', $tags)
            ->with('megazines', $megazines)
            ->with('books', $books)
            ->with('tv', $tv)
            ->with('radios', $radios)
            ->with('singles', $singles)
            ->with('albums', $albums)
            ->with('movies', $movies)
            ->with('series', $series);
    }

  public function ContentAdminGraph()
  {
  	    $AllSongs=Songs::whereNull('album')->count();
        
        $AllAlbums= Albums::all()->count();
        
        $AllMovies=Movie::all()->count();
        
        $AllMegazines=Megazines::all()->count();
        
        $AllBook=Book::all()->count();
        
        $AllRadio=Radio::all()->count();
        
        $AllTv=Tv::all()->count();
        
        $AllMovies=Movie::all()->count();

        $AllSeries=0;


        $Content=array(
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

  public function DonutGraph()
  {
        $PendingSongs=Songs::where('album','=',0)
                                              ->where('status','<>','Aprobado')
                                              ->count();
        
        $PendingAlbums= Albums::where('status','<>','Aprobado')->count(); 
        
        $PendingMovies=Movie::where('status','<>','Aprobado')->get()->count();
        
        $PendingMegazines=Megazines::where('status','<>','Aprobado')->get()->count();
        
        $PendingBook=Book::where('status','<>','Aprobado')->get()->count();
        
        $PendingRadio=Radio::where('status','<>','Aprobado')->get()->count();
        
        $PendingTv=Tv::where('status','<>','Aprobado')->get()->count();
        
        $PendingMovies=Movie::where('status','<>','Aprobado')->get()->count();

        $PendingSeries=0;


        $AllPending= $PendingSeries+$PendingMovies+$PendingTv+$PendingRadio+$PendingBook+$PendingMegazines+$PendingMovies+$PendingAlbums+$PendingSongs;


        $AprovedSongs=Songs::where('album','=',0)
                                              ->where('status','=','Aprobado')
                                              ->count();
        
        $AprovedAlbums= Albums::where('status','=','Aprobado')->count(); 
        
        $AprovedMovies=Movie::where('status','=','Aprobado')->get()->count();
        
        $AprovedMegazines=Megazines::where('status','=','Aprobado')->get()->count();
        
        $AprovedBook=Book::where('status','=','Aprobado')->get()->count();
        
        $AprovedRadio=Radio::where('status','=','Aprobado')->get()->count();
        
        $AprovedTv=Tv::where('status','=','Aprobado')->get()->count();
        
        $AprovedMovies=Movie::where('status','=','Aprobado')->get()->count();

        $AprovedSeries=0;

        $AllAproved= $AprovedSeries+$AprovedMovies+$AprovedTv+$AprovedRadio+$AprovedBook+$AprovedMegazines+$AprovedMovies+$AprovedAlbums+$AprovedSongs;

                $Content=array(
                          $AllPending,
                          $AllAproved 
                         );

         return Response()->json($Content);       
  }

  public function TagsBarGraph()
  {
    $MusicTags = Tags::where('type_tags','=','Musica')->count();

    $MoviesTags = Tags::where('type_tags','=','Peliculas')->count();

    $RadiosTags = Tags::where('type_tags','=','Radios')->count();

    $TVTags = Tags::where('type_tags','=','TV')->count();

    $BooksTags = Tags::where('type_tags','=','Libros')->count();

    $MegazineTags = Tags::where('type_tags','=','Revistas')->count();

    $SeriesTags = Tags::where('type_tags','=','Series')->count();
    
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

  public function TagsDountsGraph()
  {
    
    $AprovedTags = Tags::where('status','=','Aprobado')->count();

    $PendingTags = Tags::where('status','=','En Proceso')->count();


    $Content=array($PendingTags, $AprovedTags);

    return Response()->json($Content);
  }

  public function MusicianPieGraphData()
  {
            $AprovedMusician= music_authors::where('status','=','En Proceso')->count();
            $PendingMusician= music_authors::where('status','=','Aprobado')->count();               
            $Content=array($AprovedMusician, $PendingMusician);

      return Response()->json($Content); 
  }

  public function MusicianBarrGraphData()
  {
    
            $Musician= music_authors::where('type_authors','=','Solista')->count();
            $Band= music_authors::where('type_authors','=','Agrupacion Musical')->count();               
            $Content=array($Musician, $Band);

      return Response()->json($Content); 
  }
}
