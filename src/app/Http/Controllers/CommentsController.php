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
        $comment->comment = $request->input('comment');
        if($comment->save()){
            return redirect('posts/'.$id);
        } else {
            return redirect('posts/'.$id)->with('error', 'Could not post comment.');
        }
    }

    public function destroy($post, $id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('posts/'.$post);
    }
}
