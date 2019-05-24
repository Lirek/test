<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ActiveUsers
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
        if (Auth::guard()->user()->account_status=='closed') 
        {          
            return response()->view('errors.inactive');
        }
        return $next($request);
    }
}
