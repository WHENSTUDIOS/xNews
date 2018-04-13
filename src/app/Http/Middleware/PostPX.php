<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class PostPX
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
        if(Auth::check()){
            if($request->is(['posts/create', 'posts/*/edit'])){
                if(User::level() >= 2){
                    return $next($request);
                } else {
                    return response()->view('pages.nopermission');
                }
            }
        } else {
            return redirect('login');
        }
        return $next($request);
    }
}
