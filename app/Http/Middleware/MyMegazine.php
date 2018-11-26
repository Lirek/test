<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;
use Transactions;

class MyMegazine
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
        $Megazine=$request->route()->parameter('id');
        
        $user=Auth::guard()->id;

        $x=Transactions::where('megazines_id','=',$Megazine)
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
