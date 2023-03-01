<?php

namespace App\Events\PackingList;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetPackingListDataOneEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $batch;
    public $number;

    public function __construct($batch,$number)
    {
        $this->batch = $batch;
        $this->number = $number;
    }


}
