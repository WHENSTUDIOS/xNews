<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationsController extends Controller
{
    public function clear(){
        $notifications = Notification::where('user_id','=',Auth::user()->id)->get();
        foreach($notifications as $notification){
            $notification->delete();
        }
        return redirect('dashboard')->with('success', 'Cleared notifications.');
    }
}
