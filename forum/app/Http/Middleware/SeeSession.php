<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class SeeSession
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
        //Log::debug("called before Controller");

        $response = $next($request);

        //Log::debug("called after Controller");
        //dd($request->session()->all());
        
        return $response;
        
    }
}
