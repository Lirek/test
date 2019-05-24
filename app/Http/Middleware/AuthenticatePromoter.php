<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticatePromoter
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
         if (! Auth::guard('Promoter')->check()) 
            {
             return redirect('/promoter_login');
            }
            
        return $next($request);
    }
}
