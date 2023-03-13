<?php

namespace App\Exports;

use App\Models\PackingList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PackingListBatchExport implements FromCollection, WithHeadings
{

    protected $batch;

    public function __construct($batch)
    {
        $this->batch = $batch;
    }

    public function collection()
    {

        $packinglists = PackingList::select('pl_status','pl_po_cut','pl_master_po','pl_factory_po',
            'pl_order_quantity','pl_country','pl_crd','pl_pre_pack')
            ->where('pl_batch',$this->batch)
            ->get();

        return $packinglists;

    }

    public function headings(): array
    {
        return [
            'Status',
            'PO',
            'Master PO',
            'Factory PO',
            'Quantity',
            'Customer',
            'CRD',
            'Pre Pack',

        ];

    }
}
