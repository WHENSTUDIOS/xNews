<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;

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
    public function update_post(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update_id = Auth::user()->name;
        $post->save();
        return redirect('/dashboard/articles/list');
    }
    public function create_article(){
        if(Auth::check()){
            return view('dashboard.articles.create');
            } else {
            return redirect('login');
            }
    }
    public function store_article(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::user()->id;
        $post->update_id = Auth::user()->name;
        $post->save();
        return redirect('/dashboard/articles/list');
    }
    public function search(Request $request){
        $this->validate($request, [
            'q' => 'required',
        ]);

        $post = new Post;
        $result = Post::where('title', 'LIKE', '%'.$request->input('q').'%')->orWhere('body','LIKE','%'.$request->input('q').'%')->get();
        return view('dashboard.articles.search_result')->with('result', $result)->with('q', $request->input('q'));
    }
    public function list_users(){
        $user = new User;
        $users = User::orderBy('created_at','desc')->get();
        return view('dashboard.users.list')->with('users', $users);
    }
    public function search_user(){
        if(Auth::check()){
            return view('dashboard.users.search');
            } else {
            return redirect('login');
            }
    }
    public function search_users(Request $request){
        $this->validate($request, [
            'q' => 'required',
        ]);

        $user = new User;
        $result = User::where('name', 'LIKE', '%'.$request->input('q').'%')->orWhere('email','LIKE','%'.$request->input('q').'%')->get();
        return view('dashboard.users.search_result')->with('result', $result)->with('q', $request->input('q'));
    }
}
