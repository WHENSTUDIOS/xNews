<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\Notification;
use Illuminate\Http\Request;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);

        view()->composer('dashboard.dashboard.header', function($view){
            $notifications = Notification::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->take(8)->get();
            $callback = $this->app->request->getRequestUri();
            $view->with('notifications', $notifications)->with('callback', $callback);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
