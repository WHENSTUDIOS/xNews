<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Auth;
use App\Data;
use App\Social;
use App\User;
use App\Post;

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
            if(Auth::user()->level === 0){
                return view('pages.banned');
            } else {
                return redirect('/home');
            }
        } else {
            return redirect('/login');
        }
    }
    public function profile($id){
        $social = Social::find($id);
        $user = User::find($id);
        $post_count = Post::where('user_id', '=', Auth::user()->name)->get();
        return view('pages.profile')->with('social', $social)->with('user', $user)->with('posts', $post_count);
    }
}
