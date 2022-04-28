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

    public function __construct($cuts)
    {
        $this->cuts = $cuts;
    }

}
