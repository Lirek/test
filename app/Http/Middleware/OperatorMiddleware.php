<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
        
class OperatorMiddleware
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
        if (Auth::guard('Promoter')->user()->priority <= 3) 
        {   
            return $next($request);    
        }

        return redirect('home')->with('error','No Esta Autorizado');
    }
}
