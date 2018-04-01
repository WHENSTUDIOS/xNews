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
Route::get('/home', 'PostsController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('posts', 'PostsController');
Route::post('posts', 'PostsController@store');
Route::get('posts/create', 'PostsController@create');
Route::put('posts/{post}', 'PostsController@update');
Route::get('posts/{post}', 'PostsController@show');
Route::delete('posts/{post}', 'PostsController@destroy');
Route::get('posts/{post}/edit', 'PostsController@edit');
Route::get('/terms', 'PagesController@terms');

//User Dashboard

Route::get('/dashboard', 'DashboardController@dashboard');
Route::redirect('/admin', '/dashboard');
Route::get('/dashboard/articles/list', 'DashboardController@list_articles');
Route::get('/dashboard/articles/edit/{id}', 'DashboardController@edit_article');
Route::put('/dashboard/articles/update/{id}', 'DashboardController@update_post');
Route::get('/dashboard/articles/create', 'DashboardController@create_article');
Route::post('dashboard/articles/create/new', 'DashboardController@store_article');

Route::post('/dashboard/articles/search', 'DashboardController@search');

Auth::routes();