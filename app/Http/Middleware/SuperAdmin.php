<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class SuperAdmin
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
        if (Auth::guard('Promoter')->user()->priority == 1) 
        {   
            return $next($request);    
        }
        return redirect('home')->with('error','No Esta Autorizado');
    }   
}
