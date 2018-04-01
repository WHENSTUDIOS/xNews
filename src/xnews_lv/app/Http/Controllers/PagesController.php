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
}
