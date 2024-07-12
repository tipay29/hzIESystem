<?php

namespace App\Imports\v2PackingList;

use App\Models\v2PackingList;
use App\Models\v2PackingListBatch;
use App\Models\v2PackingListContent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class v2PLUpload implements ToModel, WithHeadingRow
{
    protected $brandntype;
    protected $pl_batch;

    public function __construct($brandntype)
    {

        $this->brandntype = $brandntype;
        $this->pl_batch = v2PackingListBatch::create();//create number batch

    }

    public function model(array $row)
    {

            //make packing list
            $packinglist = $this->createPackingList();

            //packing lists content
            if(1===1){
                return new v2PackingListContent([
                    'v2pl_item_num' => $row['master_po'],
                    'v2pl_uniq_item_num' => $row['factory_po'],
                    'v2pl_sku' => $row['style'],
                    'v2pl_material' => $row['material'],
                    'v2pl_mat_description' => $row['material_description'],
                    'v2pl_color' => $row['color_description'],
                    'size_id' => 1,
                    'v2pl_order_qty' => $row['quantity'],
                    'v2pl_net_weight' => $row['quantity'],
                    'v2pl_total_net_weight' => $row['quantity'],
                    'v2pl_gross_weight' => $row['quantity'],
                    'v2pl_total_gross_weight' => $row['quantity'],
                ]);
            }
        return null;
    }

    public function headingRow(): int
    {
        return 2;
    }

    protected function createPackingList(){

        $packinglist = $this->pl_batch->v2_packing_lists()->create(['user_id' => auth()->user()->id]);

        return $packinglist;
    }
}
