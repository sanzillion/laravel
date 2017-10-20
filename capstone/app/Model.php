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
            Log::info('Creating');
        });

        static::updating(function ($model) {
            Log::info('Updating');
        });

        static::deleting(function ($model) {
            Log::info('Deleting');
        });
        
        parent::boot();
    }
}
