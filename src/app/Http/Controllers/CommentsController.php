<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Post;
use App\User;

class CommentsController extends Controller
{
    public function store(Request $request, $id){
        $this->validate($request, [
            'comment' => 'required|max:250|min:3',
        ], [
            'comment.required' => 'Please enter a comment.',
            'comment.max' => 'Comment must be 250 characters or less.',
            'comment.min' => 'Comment must be more than 3 characters.',
        ]);

        $post = Post::find($id);
        $comment = new Comment;
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $sanitized = strip_tags($request->input('comment'));
        $finished = preg_replace('/(^|)@([\w_]+)/', '<a href="../profile/$2">@$2</a>', $sanitized);
        $comment->comment = $finished;

        if($comment->save()){
            return redirect('posts/'.$id);
        } else {
            return redirect('posts/'.$id)->with('error', 'Could not post comment.');
        }
    }

    public function destroy($post, $id){
        $comment = Comment::find($id);
        if($comment->user_id == Auth::user()->id || Auth::user()->level >= 3){
            $comment->delete();
            return redirect('posts/'.$post);
        } else {
            return redirect('posts/'.$post);
        }
    }
}
