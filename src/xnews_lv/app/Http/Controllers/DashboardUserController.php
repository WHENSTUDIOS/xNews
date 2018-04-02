<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Redirect;

class DashboardUserController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:25|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:2',
            'level' => 'required',
        ],
    [
        'name.required' => 'Please provide a username.',
        'email.unique' => 'Sorry, this email is already taken.',
        'name.unique' => 'Sorry, this username is already taken.',
        'password.required' => 'Please enter a password.',
        'level.required', 'Please select an authentication level.',
    ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->level = $request->input('level');

        if($user->save()){
            return view('dashboard.users.create')->with('success', 'Successfully created user.');
        } else {
            return view('dashboard.users.create')->with('error', 'Server error creating user.');
        }
    }

    public function delete($id){
        $user = User::find($id);
        if($user->delete()){
            return redirect('dashboard/users/list')->with('success', 'User deleted successfully.');
        } else {
            return redirect('dashboard/users/list');
        }
    }
}
