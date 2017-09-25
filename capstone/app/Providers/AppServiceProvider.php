<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
            $view->with('archives', \App\Post::archives());
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));
        });

        view()->composer('layouts.nav', function($view){

            if(Auth::guard('admin')->check()){
                $url = '/admin/logout';
            }
            else{
                $url = '/logout';
            }

            $view->with('url', $url);
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
