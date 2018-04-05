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
Route::post('dashboard/articles/create/new', 'DashboardPostController@store');
Route::get('/dashboard/users/list', 'DashboardController@list_users');
Route::get('/dashboard/users/search', 'DashboardController@search_user');
Route::get('/dashboard/users/create', 'DashboardController@create_user');
Route::get('/dashboard/users/edit/{id}', 'DashboardController@edit_user');
Route::get('/dashboard/users/staff', 'DashboardController@list_staff');
Route::get('/dashboard/settings/database', 'DashboardController@database');
Route::get('/dashboard/content/wcms', 'DashboardController@wcms');
Route::get('/dashboard/settings/access', 'DashboardController@access');
Route::get('/dashboard/settings/data', 'DashboardController@settings_data');
Route::get('/dashboard/content/templates', 'DashboardController@article_templates');
Route::get('/dashboard/content/templates/craete', 'DashboardController@create_template');


Route::post('/dashboard/users/search/result', 'SearchController@user');
Route::post('/dashboard/articles/search', 'SearchController@post');
Route::post('/dashboard/users/create/user', 'DashboardUserController@register');
Route::post('/dashboard/users/edit/details/{id}', 'DashboardUserController@edit_details');
Route::post('/dashboard/users/edit/password/{id}', 'DashboardUserController@edit_password');
Route::post('/dashboard/users/edit/profile/{id}', 'DashboardUserController@edit_profile');
Route::put('/dashboard/users/demote/{id}', 'DashboardUserController@demote_user');
Route::post('/dashboard/settings/database', 'DashboardSettingsController@database');
Route::post('/dashboard/content/wcms/general', 'DashboardSettingsController@wcms_data');
Route::post('/dashboard/settings/access', 'DashboardSettingsController@edit_access');
Route::post('/dashboard/content/templates/create', 'DashboardSettingsController@create_template');
Route::put('/dashboard/settings/templates/active/{id}', 'DashboardSettingsController@template_active');

Route::delete('dashboard/users/delete/{id}', 'DashboardUserController@delete');
Route::delete('dashboard/articles/delete/{id}', 'DashboardPostController@delete');


Auth::routes();