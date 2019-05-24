<?php

namespace App\Http\Middleware;
use \Torann\GeoIP\Facades\GeoIP;
use Closure;

class GeoLock
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

        $ip=geoip()->getLocation(request()->ip());
        if ($ip['country']=='Ecuador')
        {
          return $next($request);
        }
         return response()->view('errors.404');
    }
}
