<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

use Auth;
use User;
use Transactions;

class MyAlbums
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $albums=$request->route()->parameter('id');
        
        $user=Auth::guard()->id;

        $x=Transactions::where('album_id','=',$albums)
                        ->where('user_id','=',$user)
                        ->count();
       
        if ($x==1) 
        {
            return $next($request);    
        }
        else
        {
            return response()->json(['message'=>'El Contenido No Forma Parte de Su Coleccion'],401);
        }
    }
}
