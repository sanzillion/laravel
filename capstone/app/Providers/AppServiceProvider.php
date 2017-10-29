<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\QueryException;
use Auth;
use App\Application;
use App\Entry;
use App\File;
use App\Msg;
use App\Send;
use App\Tracker;
use Carbon\Carbon;

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
            $recents = \App\Post::latest()->limit(10)->get();
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags', 'recents'));
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

        view()->composer('layouts.dashboard.header', function($view){
            $notif = [];
            $counter = 0;
            $date = (new Carbon('tomorrow'))->format('Y-m-d');

            function ihap($count, &$var)
            {
                ($count > 0)? $var++: $var;
            }

            function trying($count ,$query){
                if($count == 0){ return 'none'; }
                else{ return $query->created_at->diffForHumans();}
            }

            function between($date){
                if(Tracker::firstTime(auth()->user()->id)){
                    return new \App\File;
                }
                else{
                    $adminLastOut = Tracker::lastout(auth()->user()->id);
                    $count = File::whereBetween('created_at', [$adminLastOut, $date]);
                    return $count;
                }
            }

            $notif['txt'] = Send::count();
            $notif['txttime'] = trying(Send::count(), Send::first());
            ihap($notif['txt'], $counter);

            $notif['apply'] = Application::count();
            $notif['applytime'] = trying(Application::count(), Application::first());
            ihap($notif['apply'], $counter);

            $notif['entry'] = Entry::count();
            $notif['entrytime'] = trying(Entry::count(), Entry::first());
            ihap($notif['entry'], $counter);

            $notif['files'] = between($date)->count();
            $notif['filestime'] = trying(between($date)->count(), between($date)->first());
            ihap($notif['files'], $counter);

            $notif['msg'] = Msg::limit(5)->get();

            $notif['count'] = $counter;
            // dd($notif);
            // dd($notif['msg'][0]->name);
            $view->with('notif', $notif);
        });

        view()->composer('layouts.dashboard.sidenav', function($view){
            $sidenotif = [];
            $date = (new Carbon('tomorrow'))->format('Y-m-d');

            function betweens($date, $class){
                if(Tracker::firstTime(auth()->user()->id)){
                    return $class;
                }
                $adminLastOut = Tracker::lastout(auth()->user()->id);
                $results = $class->whereBetween('created_at', [$adminLastOut, $date]);
                return $results;
            }

            $sidenotif['txt'] = Send::count();
            $sidenotif['apply'] = Application::count();
            $sidenotif['entry'] = Entry::count();
            $sidenotif['msg'] = Msg::count();
            $file = new \App\File;
            $sidenotif['files'] = betweens($date, $file)->count();
            $logs = new \App\Tracker;
            $sidenotif['logs'] = betweens($date, $logs)->count();
            // dd($sidenotif);
            $view->with('snotif', $sidenotif);
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
