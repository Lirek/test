<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;

use App\Transformers\AlbumsTransformer;
use App\Transformers\SongsTransformer;
use App\Transformers\MusicAuthorTransformer;
use App\Transformers\SellerTransformer;
use App\Transformers\TagsTransformer;
use App\Transformers\BooksTransformer;
use App\Transformers\MegazinesTransformer;



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
    	$MusicAuthors = music_authors::where('status','=','Aprobado')
                                                                    ->with('Seller')
                                                                    ->with('songs')
                                                                    ->with('albums')
                                                                    ->get();

    	if ($MusicAuthors->isEmpty()) { 
								return Response::json(['error'=>'Esta Vacio'], 200);
									}

		$Json = Fractal::create()
                           ->collection($MusicAuthors)
                           ->transformWith(new MusicAuthorTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
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
								return Response::json(['error'=>'Esta Vacio'], 200);
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
								return Response::json(['error'=>'Esta Vacio'], 200);
									}

			$Json = Fractal::create()
                           ->collection($Megazines)
                           ->transformWith(new MegazinesTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);
    }

    public function Single($id)
    {
        $Songs=Songs::findOrFail($id)->whereNull('album')
                                      ->with('Seller')
                                      ->with('autors')
                                      ->where('status','=','Aprobado')
                                      ->get();
            
            if ($Songs->isEmpty()) { 
                                return Response::json(['error'=>'Esta Vacio'], 200);
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
        $Megazines= Megazines::findOrFail($id)->where('status','=','Aprobado')
                                                            ->with('Seller')
                                                            ->with('sagas')
                                                            ->with('tags_megazines')
                                                            ->with('Rating')
                                                            ->get();

        if ($Megazines->isEmpty()) { 
                                return Response::json(['error'=>'Esta Vacio'], 200);
                                    }

            $Json = Fractal::create()
                           ->collection($Megazines)
                           ->transformWith(new MegazinesTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();

        return Response::json($Json);
    }

    public function Album($id)
    {
        $Albums = Albums::findOrFail($id)->where('status','=','Aprobado')
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

    public function Book($id)
    {
        $Books= Book::findOrFail($id)->where('status','=','Aprobado')
                                                    ->with('author')
                                                    ->with('seller')
                                                    ->get();

                    if ($Books->isEmpty()) { 
                                return Response::json(['error'=>'Esta Vacio'], 200);
                                    }

            $Json = Fractal::create()
                           ->collection($Books)
                           ->transformWith(new BooksTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);
    }

    public function MusicAuthor($id)
    {
        $MusicAuthor = music_authors::findOrFail($id)->where('status','=','Aprobado')
                                                                    ->with('Seller')
                                                                    ->with('songs')
                                                                    ->with('albums')
                                                                    ->get();

        if ($MusicAuthor->isEmpty()) { 
                                return Response::json(['error'=>'Esta Vacio'], 200);
                                    }

        $Json = Fractal::create()
                           ->collection($MusicAuthor)
                           ->transformWith(new MusicAuthorTransformer)                
                           ->parseIncludes(['Albums','Seller','Singles'])
                           ->toArray();          

        return Response::json($Json);                                   
    }
}
