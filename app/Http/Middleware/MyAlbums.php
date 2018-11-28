<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

use Auth;
use App\Transactions;

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
        
        $user=Auth::guard()->user()->id;

        try 
        {
            $x=Transactions::where('album_id','=',$albums)
                        ->where('user_id','=',$user)
                        ->firstOrfail();   
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) 
        {
            return redirect('/home')->withError('El Contenido No Forma Parte de Su Coleccion.');
        }

    }
}
