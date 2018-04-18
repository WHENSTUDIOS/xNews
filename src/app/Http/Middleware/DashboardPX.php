<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class DashboardPX
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
            if($request->is(['dashboard/*', 'dashboard']) && User::level() <= 1){
                return redirect('home');
            }
            if($request->is(['dashboard/articles/*', 'dashboard/users/list'])){
                if(User::level() >= 2){
                    return $next($request);
                } else {
                    return redirect('/dashboard');
                }
            }
            if($request->is(['dashboard/users/*', 'dashboard/content/*'])){
                if(User::level() >= 3){
                    return $next($request);
                } else {
                    return redirect('/dashboard');
                }
            }
            if($request->is(['dashboard/settings/*'])){
                if(User::level() >= 4){
                    return $next($request);
                } else {
                    return redirect('/dashboard');
                }
            }
        } else {
            return redirect('login');
        }
        return $next($request);
    }
}
