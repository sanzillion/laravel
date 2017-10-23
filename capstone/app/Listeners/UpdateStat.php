<?php

namespace App\Listeners;

use App\Events\Stats;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Stat;

class UpdateStat
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
     * @param  Stats  $event
     * @return void
     */
    public function handle(Stats $event)
    {
        $stat = Stat::find($event->month);
        $stat[$event->column] += 1;
        $stat->uptime += 1;
        $stat->update();
    }
}
