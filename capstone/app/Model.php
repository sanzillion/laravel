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
            if(auth()->check()){
                if(\Auth::guard('admin')->check()){
                    $name = get_class($model);
                    $name = substr($name, strpos($name, '\\')+1, strlen($name));
                    // event(new Tracking(auth()->user()->name, 'Created', $name.': id = '.$model->id));
                    Tracker::create([
                        'user' => auth()->user()->id,
                        'type' => 'admin',
                        'action' => 'Created',
                        'description' => $name.': id = '.$model->id
                    ]);
                }
            }
        });

        static::updated(function ($model) {
            if(auth()->check()){
                if(\Auth::guard('admin')->check()){
                    $name = get_class($model);
                    $name = substr($name, strpos($name, '\\')+1, strlen($name));
                    // event(new Tracking(auth()->user()->name, 'Created', $name.': id = '.$model->id));
                    Tracker::create([
                        'user' => auth()->user()->id,
                        'type' => 'admin',
                        'action' => 'Updated',
                        'description' => $name.': id = '.$model->id
                    ]);
                }   
            }
        });

        static::deleted(function ($model) {
            if(auth()->check()){
                if(\Auth::guard('admin')->check()){
                    $name = get_class($model);
                    $name = substr($name, strpos($name, '\\')+1, strlen($name));
                    // event(new Tracking(auth()->user()->name, 'Created', $name.': id = '.$model->id));
                    Tracker::create([
                        'user' => auth()->user()->id,
                        'type' => 'admin',
                        'action' => 'Deleted',
                        'description' => $name.': id = '.$model->id
                    ]);
                }
            }
        });
        
        parent::boot();
    }
}
