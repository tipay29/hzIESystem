<?php

namespace App\Imports;

use App\Models\PoTrace;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
class FirstSheetImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue, SkipsEmptyRows
{



    public function model(array $row)
    {
        return new PoTrace([
            'factory_po' => $row['factory_po'],
            'po_number' => $row['po'],
            'style_code' => $this->checkStyle($row['vf_style']),
            'style_description' => $row['style_desc'],
            'style_color' => $row['style_color'],
            'style_color_name' => $row['color_name'],
            'size' => $row['size'],
            'original_quantity' => $row['original_qty'],
            'accumulate_quantity' => $row['cfmf_qty'],
            'status' => $row['production_status'],
        ]);
    }

    public function batchSize(): int
    {
        return 5000;
    }

    public function chunkSize(): int
    {
        return 5000;
    }

    protected function checkStyle($style_val){

        if(is_numeric($style_val)){
            return $style_val;
        }else{
            return substr($style_val, -5);
        }

    }
}
