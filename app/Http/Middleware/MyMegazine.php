<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;
use App\Transactions;

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
        
        $user=Auth::guard()->user()->id;

        try 
        {
            $x=Transactions::where('megazines_id','=',$Megazine)
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
