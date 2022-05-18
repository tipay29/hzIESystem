<?php

namespace App\Listeners;

use App\Events\InsertCutTableEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InsertCutTableListener
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
     * @param  \App\Events\InsertCutTableEvent  $event
     * @return void
     */
    public function handle(InsertCutTableEvent $event)
    {
        //
    }
}
