<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
        return view('dashboard.dashboard');
        } else {
        return redirect('login');
        }
    }
}
