<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ApiResponse' => [
            'App\Listeners\TruncateSend',
        ],
        'App\Events\MobileApp' => [
            'App\Listeners\AppStatus'
        ],
        'App\Events\SosApp' => [
            'App\Listeners\MsgStatus'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
