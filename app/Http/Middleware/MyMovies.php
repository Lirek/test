<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Transactions;


class MyMovies
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
        
        $user=Auth::guard()->user()->id;
       
        try 
        {
                $x=Transactions::where('movies_id','=',$Content)
                        ->where('user_id','=',$user)
                        ->firstOrfail();   
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return redirect('/home')->withError('El Contenido No Forma Parte de Su Coleccion.');
        }

        return $next($request);
    }
}
