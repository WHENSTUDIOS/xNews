<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
use App\Auth;
use App\Data;

class FollowController extends Controller
{
    public function follow($id){
        $follow = new Follow;
        $receiver = User::find($id);
        $get = Follow::where('sender', '=', Auth::user()->name)->where('receiver', '=', $receiver->name);

        //Check if already following:
        if(count($get) == 0){
            $follow->sender = Auth::user()->name;
            $follow->receiver = $receiver->name;
        }
    }
}
