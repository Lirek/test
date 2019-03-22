<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class RedirectIfPromoterAuthenticated
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

            if (Auth::guard()->check()) 
                {
                 return redirect('/home');
                }

            if (Auth::guard('web_seller')->check())
                 {
                  return redirect('/seller_home');
                 }

            if (Auth::guard('Promoter')->check()) 
                {
                 return redirect('/promoter_home');
                }
            if (Auth::guard('bidder')->check()) {
                return redirect('/bidder_home');
            }

        return $next($request);
    }
}
