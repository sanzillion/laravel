<?php

namespace App\Listeners;

use App\Events\ApiResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Send;

class TruncateSend
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
     * @param  ApiResponse  $event
     * @return void
     */
    public function handle(ApiResponse $event)
    {
        Send::truncate();
    }
}
