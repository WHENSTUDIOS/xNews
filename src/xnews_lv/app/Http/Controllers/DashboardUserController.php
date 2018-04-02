<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\User;
use App\Social;
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
        $social = new Social;
        $social->user_id = Auth::user()->id;

        if($user->save()){
            if($social->save()){
                return redirect('dashboard/users/list')->with('success', 'Successfully created user.');
            } else {
                return redirect('dashboard/users/list')->with('error', 'Server error creating user.');
            }
        } else {
            return redirect('dashboard/users/list')->with('error', 'Server error creating user.');
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

    public function edit_details(Request $request, $id){
        $user = User::find($id);

        $this->validate($request, [
            'edit-name' => 'required',
            'edit-email' => 'required',
            'edit-level' => 'required', 
        ]);

        $user->name = $request->input('edit-name');
        $user->email = $request->input('edit-email');
        $user->level = $request->input('edit-level');
        if($user->save()){
            return redirect('dashboard/users/edit/'.$user->id)->with('success', 'User edited successfully.');
        } else {
            return redirect('dashboard/users/list');
        }
    }
}
