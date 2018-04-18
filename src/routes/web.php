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

if(Config::get('site.data.install') === 'true'){
    return redirect('/install');
}
if(Auth::check()){
    if(Auth::user()->level === 0){
        return redirect('/banned');
    }
}

//Main Website Routes
Route::get('/home', 'PostsController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('posts', 'PostsController@index');
Route::get('/terms', 'PagesController@terms');
Route::get('/install', 'InstallController@show');
Route::get('/banned', 'PagesController@banned');
Route::get('/profile/{id}', 'PagesController@profile');
Route::get('/profile/{id}/posts', 'PagesController@profile_posts');
Route::get('posts/{post}', 'PostsController@show');

Route::middleware(['postperms'])->group(function () {
    Route::post('posts', 'PostsController@store');
    Route::get('posts/create', 'PostsController@create');
    Route::put('posts/{post}', 'PostsController@update');
    Route::delete('posts/{post}', 'PostsController@destroy');
    Route::get('posts/{post}/edit', 'PostsController@edit');
});

Route::middleware(['dashboardperms'])->group(function (){
    //User Dashboard Routes
    Route::get('/dashboard', 'DashboardController@dashboard');
    Route::get('/dashboard/articles/list', 'DashboardController@list_articles');
    Route::get('/dashboard/articles/edit/{id}', 'DashboardController@edit_article');
    Route::get('/dashboard/articles/create', 'DashboardController@create_article');
    Route::get('/dashboard/users/list', 'DashboardController@users_list');
    Route::get('/dashboard/users/search', 'DashboardController@search_user');
    Route::get('/dashboard/users/create', 'DashboardController@create_user');
    Route::get('/dashboard/users/edit/{id}', 'DashboardController@edit_user');
    Route::get('/dashboard/users/staff', 'DashboardController@users_staff');
    Route::get('/dashboard/settings/database', 'DashboardController@settings_database');
    Route::get('/dashboard/content/wcms', 'DashboardController@content_wcms');
    Route::get('/dashboard/settings/access', 'DashboardController@settings_access');
    Route::get('/dashboard/settings/data', 'DashboardController@settings_data');
    Route::get('/dashboard/content/templates', 'DashboardController@article_templates');
    Route::get('/dashboard/content/templates/create', 'DashboardController@create_template');
    Route::get('/dashboard/content/notices', 'DashboardController@list_notices');
    Route::get('/dashboard/content/notices/create', 'DashboardController@create_notice');
    Route::get('/dashboard/articles/categories', 'DashboardController@list_categories');
    Route::get('/dashboard/articles/categories/create', 'DashboardController@create_category');
    Route::get('/dashboard/articles/categories/edit/{id}', 'DashboardController@edit_category');

    //Dashboard Form Post Routes
    Route::post('dashboard/articles/create/new', 'DashboardPostController@store');
    Route::put('/dashboard/articles/update/{id}', 'DashboardPostController@update');
    Route::post('/dashboard/articles/search', 'SearchController@post');
    Route::post('/dashboard/users/create/user', 'DashboardUserController@register');
    Route::post('/dashboard/users/edit/details/{id}', 'DashboardUserController@edit_details');
    Route::post('/dashboard/users/edit/password/{id}', 'DashboardUserController@edit_password');
    Route::post('/dashboard/users/edit/profile/{id}', 'DashboardUserController@edit_profile');
    Route::put('/dashboard/users/demote/{id}', 'DashboardUserController@demote_user');
    Route::post('/dashboard/users/search/result', 'SearchController@user');
    Route::post('/dashboard/settings/database', 'DashboardSettingsController@edit_database');
    Route::post('/dashboard/content/wcms/general', 'DashboardSettingsController@edit_wcms_data');
    Route::post('/dashboard/settings/access', 'DashboardSettingsController@edit_access');
    Route::post('/dashboard/content/templates/create', 'DashboardSettingsController@create_template');
    Route::put('/dashboard/content/templates/active/{id}', 'DashboardSettingsController@template_active');
    Route::put('/dashboard/content/templates/inactive/{id}', 'DashboardSettingsController@template_inactive');
    Route::post('/dashboard/content/notices/create', 'DashboardSettingsController@create_notice');
    Route::put('/dashboard/content/notices/active/{id}', 'DashboardSettingsController@notice_active');
    Route::put('/dashboard/content/notices/inactive/{id}', 'DashboardSettingsController@notice_inactive');
    Route::post('/dashboard/content/wcms/theme', 'DashboardSettingsController@edit_theme');
    Route::post('/dashboard/articles/categories/create', 'DashboardSettingsController@create_category');
    Route::post('/dashboard/articles/categories/edit/{id}', 'DashboardSettingsController@edit_category');

    //Dashboard Delete Routes
    Route::delete('dashboard/users/delete/{id}', 'DashboardUserController@delete');
    Route::delete('dashboard/articles/delete/{id}', 'DashboardPostController@delete');
    Route::delete('/dashboard/content/templates/delete/{id}', 'DashboardSettingsController@delete_template');
    Route::delete('/dashboard/content/notices/delete/{id}', 'DashboardSettingsController@delete_notice');
    Route::delete('/dashboard/articles/categories/delete/{id}', 'DashboardSettingsController@delete_category');
});

//Redirect Routes
Route::redirect('/admin', '/dashboard');
Route::redirect('/', 'home');

Auth::routes();