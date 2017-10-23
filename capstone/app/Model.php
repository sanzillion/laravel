<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded  = [];

    public static function boot()
    {
        static::creating(function ($model) {
            Log::info('Created');
        });

        static::updating(function ($model) {
            Log::info('Updated');
        });

        static::deleting(function ($model) {
            Log::info('Deleted');
        });
        
        parent::boot();
    }
}
