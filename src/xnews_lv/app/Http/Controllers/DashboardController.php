<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
        return view('dashboard.dashboard');
        } else {
        return redirect('login');
        }
    }
    public function list_articles(){
        if(Auth::check()){
            $posts = Post::orderBy('created_at','desc')->get();
            return view('dashboard.articles.list')->with('posts', $posts);
            } else {
            return redirect('login');
            }
    }
    public function edit_article($id){
        if(Auth::check()){
            $posts = Post::find($id);
            return view('dashboard.articles.edit')->with('post', $posts);
            } else {
            return redirect('login');
            }
    }
}
