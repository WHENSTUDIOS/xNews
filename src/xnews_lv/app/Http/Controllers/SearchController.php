<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class SearchController extends Controller
{
    public function user(Request $request){
        $this->validate($request, [
            'q' => 'required',
        ]);

        $user = new User;
        $result = User::where('name', 'LIKE', '%'.$request->input('q').'%')->orWhere('email1','LIKE','%'.$request->input('q').'%')->get();
        return view('dashboard.users.search_result')->with('result', $result)->with('q', $request->input('q'));
    }

    public function post(Request $request){
        $this->validate($request, [
            'q' => 'required',
        ]);

        $post = new Post;
        $result = Post::where('title', 'LIKE', '%'.$request->input('q').'%')->orWhere('body','LIKE','%'.$request->input('q').'%')->get();
        return view('dashboard.articles.search_result')->with('result', $result)->with('q', $request->input('q'));
    }
}
