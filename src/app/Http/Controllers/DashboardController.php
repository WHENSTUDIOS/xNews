<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Social;
use App\Template;
use App\Notice;
use App\Categories;
use App\History;
use App\Notification;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            $total_posts = Post::count();
            $total_users = User::count();
            $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->take(12)->get();
            $new_users = User::orderBy('created_at', 'desc')->take(12)->get();
            $staff = $users = User::where('level', '>=', '2')->orderBy('created_at','desc')->get();
            $weekarticles = Post::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-14 days')))->count();
        return view('dashboard.dashboard')->with('users', $total_users)->with('posts', $total_posts)->with('week', $weekarticles)->with('myposts', $posts)->with('new_users', $new_users)->with('staff', $staff);
        } else {
        return redirect('login');
        }
    }
    public function list_articles(){
        if(Auth::check()){
            $posts = Post::orderBy('created_at','desc')->paginate(20);
            return view('dashboard.articles.list')->with('posts', $posts);
            } else {
            return redirect('login');
            }
    }
    public function edit_article($id){
        if(Auth::check()){
            $posts = Post::find($id);
            $category = Categories::orderBy('created_at','desc')->get();
            return view('dashboard.articles.edit')->with('post', $posts)->with('categories', $category);
            } else {
            return redirect('login');
            }
    }
    public function create_article(){
        if(Auth::check()){
            if($template = Template::where('status', '1')->first()){
                $category = Categories::orderBy('created_at','desc')->get();
                    return view('dashboard.articles.create')->with('template', $template)->with('categories', $category);
                } else {
                    $category = Categories::orderBy('created_at','desc')->get();
                    return view('dashboard.articles.create')->with('template', $template)->with('categories', $category);
                }
        } else {
            return redirect('login');
            }
    }
    public function users_list(){
        $user = new User;
        $users = User::orderBy('created_at','desc')->paginate(20);
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
            if(Auth::user()->level >= $user->level){
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
                return redirect('dashboard/users/list')->with('error', 'You cannot edit a user higher than yourself.');
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
    public function list_notices(){
        if(Auth::check()){
            $notice = Notice::orderBy('created_at','desc')->get();
            return view('dashboard.content.notices')->with('notices', $notice);
        } else {
            return redirect('login');
        }
    }
    public function create_notice(){
        if(Auth::check()){
            return view('dashboard.content.createnotice');
        } else {
            return redirect('login');
        }
    }
    public function list_categories(){
        if(Auth::check()){
            $categories = Categories::orderBy('created_at','desc')->get();
            return view('dashboard.articles.categories')->with('categories', $categories);
        } else {
            return redirect('login');
        }
    }
    public function create_category(){
        if(Auth::check()){
            return view('dashboard.articles.createcategory');
        } else {
            return redirect('login');
        }
    }
    public function edit_category($id){
        $category = Categories::where('id','=',$id)->first();
        return view('dashboard.articles.editcategory')->with('category', $category);
    }
    public function edit_history($id){
        $temp = History::where('post', $id)->first();
        if($temp !== null){
            $history = History::where('post','=',$id)->orderBy('created_at','asc')->get();
            $post = Post::where('id','=',$id)->first();
            return view('dashboard.articles.edithistory')->with('post', $post)->with('histories', $history)->with('i', 0);
        } else {
            return redirect('dashboard/articles/list')->with('error', 'That post does not have any published edit history.');
        }
    }
    public function show_history($id, $hid){
        $history = History::where('changeid','=',$hid)->where('post','=',$id)->first();
        if($history !== null){
            if($history->chars > 0){
                $echars = abs($history->chars).' characters deleted';
            } else {
                $echars = abs($history->chars).' characters added';
            }
            return view('dashboard.articles.history.view')->with('history', $history)->with('id', $id)->with('chars', $echars);
        } else {
            return redirect('dashboard/articles/list')->with('error', 'There is no history for the specified edit ID.');
        }
    }
}
