<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetCutEffEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cuts;
    public $spread_start;
    public $spread_end;

    public function __construct($cuts,$spread_start,$spread_end)
    {
        $this->cuts = $cuts;
        $this->spread_start = $spread_start;
        $this->spread_end = $spread_end;
    }

}
