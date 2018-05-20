<?php

namespace App\Http\Controllers;

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
    	$Singles = Songs::whereNull('album')->get();
    	$Albums = Albums::all();
		
		return view('contents.music')->with('MusicAuthors',$MusicAuthors)->with('Singles',$Singles)->with('Albums',$Albums); 
    }
}

