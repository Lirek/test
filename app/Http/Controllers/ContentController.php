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
    	$MusicAuthors = music_authors::all();
    	$Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->get();
    	$Albums = Albums::where('status','=','Aprobado')->get();
		
			
		return view('contents.music')->with('MusicAuthors',$MusicAuthors)->with('Singles',$Singles)->with('Albums',$Albums); 
    }

    public function ShowAllSingles()
    {
    	$Singles = Songs::where('album','=',0)->where('status','=','Aprobado')->with('autors')->get();
		
        return Datatables::of($Singles)->make(true);
 
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

