<?php

namespace App\Imports;

use App\Models\PoTrace;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PpTracesImport implements WithMultipleSheets
{
    use WithConditionalSheets;
    public function conditionalSheets(): array
    {
        return [
            'Summary' => new FirstSheetImport(),
        ];
    }
}

