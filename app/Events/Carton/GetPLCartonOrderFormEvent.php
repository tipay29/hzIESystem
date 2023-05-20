<?php

namespace App\Events\Carton;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetPLCartonOrderFormEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pl_criteria;

    public function __construct($pl_criteria)
    {
        $this->pl_criteria = $pl_criteria;
    }


}
