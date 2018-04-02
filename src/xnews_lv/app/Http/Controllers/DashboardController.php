<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Social;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            $total_posts = Post::count();
            $total_users = User::count();
        return view('dashboard.dashboard')->with('users', $total_users)->with('posts', $total_posts);
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
    public function create_user(){
        if(Auth::check()){
            return view('dashboard.users.create');
            } else {
            return redirect('login');
            }
    }
    public function edit_user($id){
        if(Auth::check()){
            $user = User::find($id);
            $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
            $social = Social::where('user_id', $user->id)->get()->first();
            if($social === null){
                $new_social = new Social;
                $new_social->user_id = $id;
                if($new_social->save()){
                    $mod_social = Social::where('user_id', $user->id)->get()->first();
                    return view('dashboard.users.edit')->with('user', $user)->with('posts', $posts)->with('social', $mod_social);
                }
            } else {
                return view('dashboard.users.edit')->with('user', $user)->with('posts', $posts)->with('social', $social);
            }

            } else {
            return redirect('login');
            }
    }
}
