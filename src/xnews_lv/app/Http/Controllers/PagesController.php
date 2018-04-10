<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Auth;
use App\Data;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function login(){
        if(Auth::guest()){
            return view('pages.login');
        } else {
            return redirect('home');
        }
    }
    public function register(){
        return view('pages.register');
    }
    public function terms(){
        if($terms = Data::find('terms')){
            return view('pages.terms')->with('terms', $terms);
        } else {
            return view('pages.terms');
        }
    }
    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
