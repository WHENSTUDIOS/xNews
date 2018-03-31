<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'home');
// Route::get('/login', 'PagesController@login');
// Route::get('/register', 'PagesController@register');
Route::get('/home', 'PagesController@home')->name('home');

Auth::routes();