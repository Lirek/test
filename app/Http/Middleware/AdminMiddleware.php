<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminMiddleware
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
        if (Auth::guard('Promoter')->user()->priority == 1 or Auth::guard('Promoter')->user()->priority == 2) 
        {   
            return $next($request);    
        }
        
        return redirect('home')->with('error','No Esta Autorizado');

    }
}
