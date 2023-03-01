<?php

namespace App\Imports;

use App\Models\PackingList;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PackingListsImport implements WithMultipleSheets
{
    use WithConditionalSheets;

    protected $brandntype;

    public function __construct($brandntype)
    {
        $this->brandntype = $brandntype;

    }

    public function conditionalSheets(): array
    {
        return [
            'Worksheet' => new FirstPlImport($this->getBatchNumber(),$this->brandntype),
        ];
    }

    protected function getBatchNumber(){

        $pl_batch_max = PackingList::max('pl_batch');

        if($pl_batch_max==null){
            return 1;
        }
        $pl_batch_max = $pl_batch_max + 1;

        return $pl_batch_max;

    }
}
