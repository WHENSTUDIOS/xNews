<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class DashboardPostController extends Controller
{
    public function delete($id){
        $post = Post::find($id);
        if($post->delete()){
            return redirect('dashboard/articles/list')->with('success', 'Post successfully deleted.');
        } else {
            return redirect('dashboard/articles/list')->with('error', 'Post was not deleted.');
        }
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::user()->id;
        $post->update_id = Auth::user()->id;
        $post->category = $request->input('category');
        $post->visible = 1;
        $post->save();
        return redirect('/dashboard/articles/list')->with('success', 'Post created.');
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'visible' => 'required',
            'category' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update_id = Auth::user()->id;
        $post->visible = $request->input('visible');
        $post->category = $request->input('category');
        $post->save();
        return redirect('/dashboard/articles/list')->with('success', 'Succesfully edited post.');
    }
}
