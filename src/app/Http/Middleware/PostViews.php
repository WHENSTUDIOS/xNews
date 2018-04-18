<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Post;

class PostViews
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
        $post = Post::find($request->route('post'));
        $views = $post->views;
        $views++;
        $post->views = $views;
        if($post->save()){
            return $next($request);
        } else {
            return redirect('home');
        }
    }
}
