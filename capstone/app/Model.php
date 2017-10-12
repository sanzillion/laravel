<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded  = [];

    public static function boot()
    {
        static::creating(function ($model) {
            return "fuck off";
        });

        static::updating(function ($model) {
            return "updated";
        });

        static::deleting(function ($model) {
            // bluh bluh
        });
        
        parent::boot();
    }
}
