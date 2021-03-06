<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Post;
use App\User;
use App\Input;

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
        $sanitized = Input::sanitize($request->input('comment'));
        $comment->comment = $sanitized;

        if($comment->save()){
            User::notifyLink($post->user_id, 'New comment on your post', Auth::user()->name.' commented on your post.', 'posts/'.$id);
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
