<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AuthenticateBidder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::guard('bidder')->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
