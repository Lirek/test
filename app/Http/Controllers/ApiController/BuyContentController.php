<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events\BuyContentEvent;

use JWTAuth;
use Auth;
use Response;

use App\User;
use App\Megazines;
use App\Tags;
use App\Albums;
use App\Songs;
use App\Seller;
use App\Radio;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\Transactions;

use App\Movie;
use App\AccountBalance;
use App\Payments;
use App\Serie;
use App\Episode;
use App\TicketsPackage;


class BuyContentController extends Controller
{
    public function BuySingle(Request $request)
    {
        $user = User::find(Auth::user()->id);

        try 
        {
        	$Single= Songs::findOrfail($request->content_id);	
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
        	return Response::json(['status'=>'Error','message'=>'El Contenido No Se Encuentra Disponible'], 404);
        }
        
        if ($Single->cost > $user->credito) 
        {
            return Response::json(['status'=>'Error','message'=>'No Posee Suficientes Tiquets'], 401);    
        }
        
        $check = Transactions::where('song_id','=',$Single->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return Response::json(['status'=>'Error','message'=>'El Contenido Ya Forma Parte de Su Coleccion'], 401);   
        }
        else
        {
            $Transaction= new Transactions;
            $Transaction->song_id=$Single->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $Single->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$Single->cost;
            $user->save(); 

            $account=new AccountBalance;
            $account->seller_id=$Single->seller_id;
            $account->balance=$Single->cost;
            $account->save();

            event(new BuyContentEvent(Auth::user()->email,$Single->song_name,$Single->cost));

            return Response::json(['status'=>'OK','message'=>'Compra Exitosa'], 201);
        }
    }

    public function BuyMovie(Request $request)
    {
        $user = User::find(Auth::user()->id);

        try 
        {
        	$movie= Movie::findOrfail($request->content_id);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
        	return Response::json(['status'=>'Error','message'=>'No Posee Suficientes Tiquets'], 401);	
        }

        if ($movie->cost > $user->credito) 
        {
            return Response::json(['status'=>'Error','message'=>'El Contenido Ya Forma Parte de Su Coleccion'], 401);    
        }

        $check = Transactions::where('movies_id','=',$movie->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return Response::json(['status'=>'Error','message'=>'El Contenido Ya Forma Parte de Su Coleccion'], 401);      
        }
        else
        {
            $Transaction= new Transactions;
            $Transaction->movies_id=$movie->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $movie->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$movie->cost;
            $user->save(); 

            $account=new AccountBalance;
            $account->seller_id=$movie->seller_id;
            $account->balance=$movie->cost;
            $account->save();

            event(new BuyContentEvent(Auth::user()->email,$movie->title,$movie->cost));

            return Response::json(['status'=>'OK','message'=>'Compra Exitosa'], 201);
        }
    }

    public function BuyBook(Request $request)
    {
        $user = User::find(Auth::user()->id);
     	
     	try
     	{
     		$book= Book::findOrfail($request->content_id); 
     	}
     	catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
     	{
     		return Response::json(['status'=>'Error','message'=>'El Contenido No Se Encuentra Disponible'], 404);
     	}

        $check = Transactions::where('books_id','=',$book->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return Response::json(['status'=>'Error','message'=>'El Contenido Ya Forma Parte de Su Coleccion'], 401);   
        }
        
        if ($book->cost > $user->credito) 
        {
            return Response::json(['status'=>'Error','message'=>'No Posee Suficientes Tiquets'], 401);    
        }

        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$book->seller_id; 
            $Transaction->books_id=$book->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $book->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$book->cost;
            $user->save(); 

            $seller = Seller::find($book->seller_id);
            $seller->credito=$seller->credito+$book->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$book->seller_id;
            $account->balance=$book->cost;
            $account->save();

            event(new BuyContentEvent(Auth::user()->email,$book->title,$book->cost));

            return Response::json(['status'=>'OK','message'=>'Compra Exitosa'], 201);
        }
    }

    public function BuyMagazines(Request $request)
    {
        $user = User::find(Auth::user()->id);

        try
	     	{
	     		$megazine= Megazines::findOrfail($request->id); 
	     	}
     	catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
	     	{
	     		return Response::json(['status'=>'Error','message'=>'El Contenido No Se Encuentra Disponible'], 404);
	     	}
      

        $check = Transactions::where('megazines_id','=',$megazine->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
           return Response::json(['status'=>'Error','message'=>'El Contenido Ya Forma Parte de Su Coleccion'], 401);   
        }
        
        if ($megazine->cost > $user->credito) 
        {
            return Response::json(['status'=>'Error','message'=>'No Posee Suficientes Tiquets'], 401);    
        }

        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$megazine->seller_id; 
            $Transaction->megazines_id=$megazine->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $megazine->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$megazine->cost;
            $user->save(); 

            $seller = Seller::find($megazine->seller_id);
            $seller->credito=$seller->credito+$megazine->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$megazine->seller_id;
            $account->balance=$megazine->cost;
            $account->save();

            event(new BuyContentEvent(Auth::user()->email,$megazine->title,$megazine->cost));

            return Response::json(['status'=>'OK','message'=>'Compra Exitosa'], 201);
        }
    }
}
