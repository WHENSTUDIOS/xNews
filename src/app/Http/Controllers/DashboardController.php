<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Social;
use App\Template;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            $total_posts = Post::count();
            $total_users = User::count();
            $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->take(12)->get();
            $new_users = User::orderBy('created_at', 'desc')->take(12)->get();
            $staff = $users = User::where('level', '>=', '2')->orderBy('created_at','desc')->get();
        return view('dashboard.dashboard')->with('users', $total_users)->with('posts', $total_posts)->with('myposts', $posts)->with('new_users', $new_users)->with('staff', $staff);
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
    public function create_article(){
        if(Auth::check()){
            if($template = Template::where('status', '1')->first()){
                    return view('dashboard.articles.create')->with('template', $template);
                } else {
                    return view('dashboard.articles.create');
                }
        } else {
            return redirect('login');
            }
    }
    public function users_list(){
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
    public function users_staff(){
        $user = new User;
        $users = User::where('level', '>=', '2')->orderBy('created_at','desc')->get();
        return view('dashboard.users.staff')->with('users', $users);
    }
    public function settings_database(){
        if(Auth::check()){
            return view('dashboard.settings.database');
            } else {
            return redirect('login');
            }
    }
    public function content_wcms(){
        if(Auth::check()){
            return view('dashboard.content.wcms');
            } else {
            return redirect('login');
            }
    }
    public function settings_access(){
        if(Auth::check()){
            return view('dashboard.settings.access');
        } else {
            return redirect('login');
        }
    }
    public function settings_data(){
        if(Auth::check()){
            return view('dashboard.settings.data');
        } else {
            return redirect('login');
        }
    }
    public function article_templates(){
        if(Auth::check()){
            $templates = Template::orderBy('created_at','desc')->get();

            $activetemplate = Template::where('status', '1')->first();
            return view('dashboard.content.templates')->with('templates', $templates)->with('activetemplate', $activetemplate);
        } else {
            return redirect('login');
        } 
    }
    public function create_template(){
        if(Auth::check()){
            return view('dashboard.content.createtemplate');
        } else {
            return redirect('login');
        }
    }
}