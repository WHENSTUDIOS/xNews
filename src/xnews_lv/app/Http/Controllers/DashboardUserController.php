<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;

class DashboardUserController extends Controller
{
    public function register(array $data){
        $this->validate($data, [
            'name' => 'required|string|max:25|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:2',
            'level' => 'required',
        ]);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'],
        ]);

        return Redirect::to('/dashboard/users/list')->with('success', 'User created successfully');
    }
}
