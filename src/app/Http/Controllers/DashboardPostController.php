<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\History;
use Auth;

class DashboardPostController extends Controller
{
    public function delete($id){
        $post = Post::find($id);
        User::notifyStaff('Post Deleted', Auth::user()->name.' deleted '.$post->title);
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
        $post->views = 0;
        $post->save();
        User::notifyStaff('New Post', 'A new post was created by '.Auth::user()->name);
        return redirect('/dashboard/articles/list')->with('success', 'Post created.');
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'visible' => 'required',
            'category' => 'required',
            'changes' => 'max:50',
        ],[
            'changes.max' => 'Maximum 50 characters for the edited changes summary.',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update_id = Auth::user()->id;
        $post->visible = $request->input('visible');
        $post->category = $request->input('category');
        $post->save();

        User::notifyStaff('Post Updated', Auth::user()->name.' edited '.$post->title);
        
        $edithistory = new History;
        $edithistory->post = $id;
        $edithistory->user_id = Auth::user()->id;
        $edithistory->changes = $request->input('changes');
        $edithistory->changeid = strtoupper(base_convert(time(), 10, 36));
        $edithistory->save();
        return redirect('/dashboard/articles/list')->with('success', 'Succesfully edited post.');
    }
    public function clear_views($id){
        $post = Post::find($id);
        $post->views = 0;
        if($post->save()){
            User::notifyStaff('Post Views Cleared', Auth::user()->name.' reset views for '.$post->title);
            return redirect('/dashboard/articles/list')->with('success', 'Succesfully reset views to 0 for "'.$post->title.'".');
        } else {
            return redirect('/dashboard/articles/list')->with('error', 'Could not reset views.');
        }
    }
}
