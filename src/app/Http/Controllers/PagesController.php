<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Auth;
use App\Data;
use App\Social;
use App\User;
use App\Post;
use App\Comment;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function login(){
        if(Auth::guest()){
            return view('pages.login');
        } else {
            return redirect('home');
        }
    }
    public function register(){
        return view('pages.register');
    }
    public function terms(){
        if($terms = Data::find('terms')){
            return view('pages.terms')->with('terms', $terms);
        } else {
            return view('pages.terms');
        }
    }
    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    public function banned(){
        if(Auth::check()){
            if(User::level() == '0'){
                return view('pages.banned');
            } else {
                return redirect('/home');
            }
        } else {
            return redirect('/login');
        }
    }
    public function profile($id){
        $user = User::where('name', $id)->first();
        if($user !== null){
            $social = Social::find($user->id);
            if($social !== null){
                $post_count = Post::where('user_id', '=', $user->id)->get();
                $comment_count = Comment::where('user_id', '=', $user->id)->get();
                return view('pages.profile')->with('social', $social)->with('user', $user)->with('posts', $post_count)->with('comments', $comment_count);
            } else {
                $new = new Social;
                $new->user_id = $user->id;
                $new->save();
                return redirect('profile/'.$id);
            }
        } else {
            return view('pages.messages.no_user')->with('name', $id);
        }
    }
    public function profile_posts($id){
        $user = User::where('name', $id)->first();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at','desc')->get();
        return view('pages.profile.posts')->with('user', $user)->with('posts', $posts);
    }

    public function edit_profile(){
        $user = Auth::user();
        $social = Social::where('user_id','=',Auth::user()->id)->first();
        return view('pages.profile.edit')->with('user', $user)->with('social', $social);
    }
}
