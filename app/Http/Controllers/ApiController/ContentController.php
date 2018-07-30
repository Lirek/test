<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;

use App\Transformers\AlbumsTransformer;

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

class ContentController extends Controller
{
    public function FormatJson($content)
    {
        $json=[
                "meta"=>'{ "status":"200"}',
                "data"=>'{'.$content.'}'
              ];

    	return Response::json(["meta"=>'{ "status":"200"}',"data"=>'{'.$content.'}']);

    }

    public function ErrorJson($message)
    {
    		
   	}

    public function EmptyJson()
    {
    	$json=[
    			"meta"=>'{ "status":"401","error":"Vacio"}',
    			"data"=>'{}'
    		  ];

    	return $json;
    }
    
    public function AllAprovedSingles()
    {
    	
	    	$Songs=Songs::whereNull('album')
	    							  ->with('Seller')
	    							  ->with('autors')
	                                  ->where('status','=','Aprobado')
	                                  ->get();
			
			if ($Songs->isEmpty()) { 
								return Response::json(['error'=>'Esta Vacio'], 200);
									}

			return $this->FormatJson($Songs);
    }

    public function AllAprovedAlbums()
    {
    	$Albums = Albums::where('status','=','Aprobado')
                                                        ->with('Seller')
                                                        ->with('Autors')
                                                        ->with('tags_music')	
	    							  					->get();

    	if ($Albums->isEmpty()) { 
								return Response::json(['error'=>'Esta Vacio'], 200);
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
    	$MusicAuthors = music_authors::where('status','=','Aprobado')->with('Seller')->get();

    	if ($MusicAuthors->isEmpty()) { 
								return Response::json(['error'=>'Esta Vacio'], 200);
									}

		return $this->FormatJson($MusicAuthors);									
    }

    public function AllAprovedBooks()
    {
    	$Books= Book::where('status','=','Aprobado')
    												->with('author')
    												->with('seller')
    												->get();

    				if ($Books->isEmpty()) { 
								return Response::json(['error'=>'Esta Vacio'], 200);
									}

			return $this->FormatJson($Books);
    }

    public function AllAprovedMegazines()
    {
    	$Megazines= Megazines::where('status','=','Aprobado')->with('Seller')->get();

    	if ($Megazines->isEmpty()) { 
								return Response::json(['error'=>'Esta Vacio'], 200);
									}

			return $this->FormatJson($Megazines);
    }

}
