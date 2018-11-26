<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;
use Transactions;

class MySeries
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
         $Content=$request->route()->parameter('id');
        
        $user=Auth::guard()->id;

        $x=Transactions::where('series_id','=',$Content)
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
