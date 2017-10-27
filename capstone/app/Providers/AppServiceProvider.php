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
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags'));
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

        view()->composer('layouts.dashboard.header', function(){
            
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
