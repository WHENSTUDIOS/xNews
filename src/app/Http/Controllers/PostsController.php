<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Social;
use App\Template;
use App\Notice;
use App\Comment;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('visible', '=', 1)->orderBy('created_at','desc')->paginate(5);
        $notices = Notice::where('status', '1')->get();
        return view('pages.home')->with('posts', $posts)->with('notices', $notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $templates = Template::orderBy('created_at','desc')->get();

            $activetemplate = Template::where('status', '1')->first();
            return view('pages.posts.create')->with('templates', $templates)->with('activetemplate', $activetemplate);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        //Create the post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::user()->id;
        $post->update_id = Auth::user()->name;
        $post->visible = 1;
        $post->save();
        User::notifyStaff('New Post', 'A new post was created by '.Auth::user()->name);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($posts = Post::find($id)){
            if($posts->visible == 0 && Auth::user()->level <= 1){
                return view('pages.nopermission');
            } else {
                $comments = Comment::where('post_id','=',$id)->orderBy('created_at','desc')->get();
                $post = Post::orderBy('created_at','desc')->where('visible','1')->take(10)->get();
                $index = 0;
                return view('pages.posts.post')->with('post', $posts)->with('comments', $comments)->with('recent', $post)->with('index', $index);
            }
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($posts = Post::find($id)){
            return view('pages.posts.edit')->with('post', $posts);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update_id = Auth::user()->id;
        $post->views = 0;
        $post->save();
        return redirect("/posts/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/home');
    }
}
