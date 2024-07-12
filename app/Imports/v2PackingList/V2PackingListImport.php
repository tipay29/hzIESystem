<?php

namespace App\Imports\v2PackingList;



use App\Imports\v2PackingList\v2PLUpload;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class V2PackingListImport implements WithMultipleSheets
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
            'Worksheet' => new v2PLUpload($this->brandntype),
        ];
    }


}
