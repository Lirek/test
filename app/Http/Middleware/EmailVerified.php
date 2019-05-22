<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class EmailVerified
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
      if (Auth::guard()->user()->email_verification==FALSE)
      {
          return response()->view('errors.EmailNotVerified');
      }

        return $next($request);
    }
}
