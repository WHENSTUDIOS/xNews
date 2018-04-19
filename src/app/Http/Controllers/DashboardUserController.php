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
        User::notifyStaff('Deleted User', Auth::user()->name.' deleted '.$user->name);
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
            'edit-level' => '', 
        ], 
    [
        'edit-name.required' => 'Please provide a username.',
        'edit-email.required' => 'Please provide an email address.',
    ]);

        if($request->input('edit-level') <= 4 && $request->input('edit-level') >=0){
            $level = $request->input('edit-level');
        } else {
            $level = $user->level;
        }

        $user->name = $request->input('edit-name');
        $user->email = $request->input('edit-email');
        if(Auth::user()->id !== $id && $request->input('edit-level') !== 0){
            $user->level = $level;
            if($user->save()){
                return redirect('dashboard/users/edit/'.$user->id)->with('success', 'User edited successfully.');
            } else {
                return redirect('dashboard/users/list');
            }
        } else {
            return redirect('dashboard/users/edit')->with('error', 'You cannot ban yourself!');
        }
    }

    public function edit_password(Request $request, $id){
        $user = User::find($id);

        $this->validate($request, [
            'new-password' => 'required',
        ],
    [
        'new-password.required' => 'Please provide a password.',
    ]);

        $user->password = Hash::make($request->input('new-password'));
        if($user->save()){
            return redirect('dashboard/users/edit/'.$user->id)->with('success', 'Password changed successfully.');
        } else {
            return redirect('dashboard/users/list')->with('error', 'Could not change password.');
        }
    }

    public function edit_profile(Request $request, $id){
        $social = Social::find($id);

        $this->validate($request, [
            'bio' => 'max:1999',
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'youtube' => '',
            'skype' => '',
        ],
        [
            'bio.max' => 'Maximum 2000 characters for your bio.',
        ]);

        $social->bio = $request->input('bio');
        $social->twitter = $request->input('twitter');
        $social->instagram = $request->input('instagram');
        $social->facebook = $request->input('facebook');
        $social->youtube = $request->input('youtube');
        $social->skype = $request->input('skype');
        if($social->save()){
            return redirect('dashboard/users/edit/'.$id)->with('success', 'Profile information updated.');
        } else {
            return redirect('dashboard/users/list')->with('error', 'Could not update profile information.');
        }
    }

    public function demote_user($id){
        $user = User::find($id);
        if($user->id !== Auth::user()->id){
            $user->level = '1';
            if($user->save()){
                User::notifyStaff('Demoted User', Auth::user()->name.' demoted '.$user->name);
                return redirect('dashboard/users/staff')->with('success', 'User demoted back to user status successfully.');
            } else {
                return redirect('dashboard/users/staff')->with('error', 'Could not demote user.');
            }
        } else {
            return redirect('dashboard/users/staff')->with('error', 'You cannot demote yourself!');  
        }
    }
}
