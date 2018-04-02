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
}
