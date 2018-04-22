<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function noticetable(){
        return view('dashboard.content.noticetable');
    }
}
