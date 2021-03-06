<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\History;
use App\Input;
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
        $post->body = Input::withHtml($request->input('body'));
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

        $before = Post::where('id',$id)->first();
        $mathchars = strlen($before->body) - strlen($request->input('body'));
        $chars = $mathchars;


        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = Input::withHtml($request->input('body'));
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
        $edithistory->before = $before->body;
        $edithistory->after = $request->input('body');
        $edithistory->chars = $chars;
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
    public function revert_edit($id, $hid){
        $history = History::where('post',$id)->where('changeid',$hid)->first();
        if($history !== null){
            $new = new History;
            $new->post = $id;
            $new->user_id = Auth::user()->id;
            $new->changes = 'REVERT EDIT: '.$hid;
            $new->changeid = strtoupper(base_convert(time(), 10, 36));
            $new->before = $history->after;
            $new->after = $history->before;
            $mathchars = strlen($history->after) - strlen($history->before);
            $chars = $mathchars;
    
            $new->chars = $chars;
            $new->save();
            $body = $history->before;
            $post = Post::find($id);
            $post->body = $body;
            $history->delete();
            $post->save();
            User::notifyStaff('Edit Reversed', 'An edit on "'.$post->title.'" was reversed.');
            return redirect('/dashboard/articles/list')->with('success', 'Successfully reverted edit.'); 
        } else {
            return redirect('/dashboard/articles/list')->with('error', 'No edit ID found in the database.');
        }
    }
}
