<?php

namespace App\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;

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



class ContentController extends Controller
{
    
  	public function ShowMusic()
    {
    	$MusicAuthors = music_authors::where('status','=','Aprobado')->get();
    	$Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->get();
    	$Albums = Albums::where('status','=','Aprobado')->get();
		
			
		return view('contents.music')->with('MusicAuthors',$MusicAuthors)->with('Singles',$Singles)->with('Albums',$Albums); 
    }

    public function ShowAllSingles()
    {
    	$Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->with('autors')->get();
		
        return Datatables::of($Singles)->make(true);
 
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

    public function ShowAllAlbum()
    {
    	$Albums = Albums::where('status','=','Aprobado')->with('autors')->with('songs')->get();
        return Datatables::of($Albums)->make(true);
    }

    public function ShowReadingsBooks()
    {
        $Books= Book::where('status','=','Aprobado')->get();
        $Megazines= Megazines::where('status','=','Aprobado')->get();
        
        return view('contents.Readings')->with('Books',$Books)->with('Megazines',$Megazines);
    }

     public function ShowReadingsMegazines()
    {
        $Megazines= Megazines::where('status','=','Aprobado')->get();

        return view('contents.Megazines')->with('Megazines',$Megazines);
    }
}

