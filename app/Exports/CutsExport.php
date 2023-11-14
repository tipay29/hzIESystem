<?php

namespace App\Exports;

use App\Models\Cut;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CutsExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function collection()
    {

        return Cut::select('building_id','table_num','work_hours','marker_length','layer_count','part_count','size_ratio',
        'spread_start','spread_end','cut_start','cut_end')->get();
    }
    public function headings(): array
    {
        return [
            'Building',
            'Table',
            'Work Hours',
            'Marker Length',
            'Layer Count',
            'Part Count',
            'Size Ratio',
            'Spread Start',
            'Spread End',
            'Cut Start',
            'Cut End',
        ];
    }
}
