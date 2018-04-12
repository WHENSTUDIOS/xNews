<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Banned
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
        if(!$request->is(['logout'])){
            if(Auth::check()){
                if(Auth::user()->level == '0'){
                    return response()->view('pages.banned');
                }
            }
        }
        return $next($request);
    }
}
