<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\User;
use App\Notification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level',
    ];

    public static function level(){
        return Auth::user()->level;
    }

    public static function notify($user, $title, $comment){
        $not = new Notification;
        $not->title = $title;
        $not->user_id = $user;
        $not->comment = $comment;
        return $not->save();
    }

    public static function notifyStaff($title, $comment){
        $not = new Notification;
        $staffs = User::where('level','>=','2')->get();
        foreach($staffs as $staff){
            $not->title = $title;
            $not->user_id = $staff->id;
            $not->comment = $comment;
            return $not->save();
        }
    }

    public static function notifyStaffLink($title, $comment, $link){
        $not = new Notification;
        $staffs = User::where('level','>=','2')->get();
        foreach($staffs as $staff){
            $not->title = $title;
            $not->user_id = $staff->id;
            $not->comment = $comment;
            $not->link = $link;
            return $not->save();
        }
    }

    public static function notifyLink($user, $title, $comment, $link){
        $not = new Notification;
        $not->title = $title;
        $not->user_id = $user;
        $not->comment = $comment;
        $not->link = $link;
        return $not->save();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
