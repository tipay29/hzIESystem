<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PackingListMultiSheetExport implements WithMultipleSheets
{

    protected $packinglists;

    public function __construct($packinglists)
    {
        $this->packinglists = $packinglists;

    }

    public function sheets(): array
    {
        $sheets = [];

        foreach($this->packinglists as $packinglist){
            $sheets[] = new PackingListExport($packinglist);


        }

        return $sheets;
    }
}
