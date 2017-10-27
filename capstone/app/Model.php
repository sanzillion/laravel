<?php

namespace App;

use App\Events\Tracking;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded  = [];

    public static function boot()
    {
        static::created(function ($model) {
            // dd($model);
            if(\Auth::guard('admin')->check()){
                $name = get_class($model);
                $name = substr($name, strpos($name, '\\')+1, strlen($name));
                // event(new Tracking(auth()->user()->name, 'Created', $name.': id = '.$model->id));
                Tracker::create([
                    'user' => auth()->user()->name,
                    'action' => 'Created',
                    'description' => $name.': id = '.$model->id
                ]);
            }
        });

        static::updated(function ($model) {
            if(\Auth::guard('admin')->check()){
                $name = get_class($model);
                $name = substr($name, strpos($name, '\\')+1, strlen($name));
                // event(new Tracking(auth()->user()->name, 'Created', $name.': id = '.$model->id));
                Tracker::create([
                    'user' => auth()->user()->name,
                    'action' => 'Updated',
                    'description' => $name.': id = '.$model->id
                ]);
            }
        });

        static::deleted(function ($model) {
            if(\Auth::guard('admin')->check()){
                $name = get_class($model);
                $name = substr($name, strpos($name, '\\')+1, strlen($name));
                // event(new Tracking(auth()->user()->name, 'Created', $name.': id = '.$model->id));
                Tracker::create([
                    'user' => auth()->user()->name,
                    'action' => 'Deleted',
                    'description' => $name.': id = '.$model->id
                ]);
            }
        });
        
        parent::boot();
    }
}
