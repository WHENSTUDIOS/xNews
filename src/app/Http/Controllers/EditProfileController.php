<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
use App\User;
use Config;
use Auth;

class EditProfileController extends Controller
{
    public function profile(Request $request){
        $this->validate($request, [
            'name' => '',
            'email' => '',
            'bio' => '',
        ]);

        $user = User::find(Auth::user()->id);
        $social = Social::where('user_id','=',Auth::user()->id)->first();
        if(Config::get('site.data.allow_username_change') == 'false'){
            $user->email = $request->input('email');
            $social->bio = $request->input('bio');
            $user->save();
            $social->save();
            return redirect('profile/edit')->with('success', 'Updated profile.');
        } else {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $social->bio = $request->input('bio');
            $user->save();
            $social->save();
            return redirect('profile/edit')->with('success', 'Updated profile.');
        }

    }

    public function social(Request $request){
        $social = Social::find(Auth::user()->id);

        $this->validate($request, [
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'youtube' => '',
            'skype' => '',
        ]);

        $social->bio = $request->input('bio');
        $social->twitter = $request->input('twitter');
        $social->instagram = $request->input('instagram');
        $social->facebook = $request->input('facebook');
        $social->youtube = $request->input('youtube');
        $social->skype = $request->input('skype');
        if($social->save()){
            return redirect('profile/edit')->with('success', 'Social information updated.');
        } else {
            return redirect('profile/edit')->with('error', 'Could not update profile information.');
        }
    }
    
}
