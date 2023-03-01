<?php

namespace App\Events\PackingList;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetPackingListDataAllEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $batch;

    public function __construct($batch)
    {
        $this->batch = $batch;
    }


}
