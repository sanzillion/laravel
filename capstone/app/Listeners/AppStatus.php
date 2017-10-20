<?php

namespace App\Listeners;

use App\Events\MobileApp;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MobileApp  $event
     * @return void
     */
    public function handle(MobileApp $event)
    {
        // session(['appStatus' => 'connected']);
    }
}
