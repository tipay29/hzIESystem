<?php

namespace App\Imports;

use App\Models\Destination;
use App\Models\PackingList;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FirstPlImport implements ToModel, WithHeadingRow
{
    protected $batch;
    protected $number_batch;
    protected $user;
    protected $brand;
    protected $type;
    protected $uniq;

    public function __construct($batch_number,$brandntype)
    {

        $this->batch = $batch_number;
        $this->number_batch = 1;
        $this->user = auth()->user()->id;
        $this->brand = $this->getPlBrand($brandntype);
        $this->type = $this->getPlType($brandntype);
        $this->uniq = 0;
    }

    public function model(array $row)
    {
        $crd = $this->convertDate($row['crd_at_origin']);
        $country = $row['dc_code'] . ' ' . $row['dest'];
        $destination = $this->getDestination($country);
        $number_batch = $this->getPlNumberBatch($crd,$country,(int)$row['prepack'],$row['po'],$this->type);
        $this->uniq++;
        return new PackingList([
            'pl_po_cut' => $row['po'],
            'pl_master_po' => $row['master_po'],
            'pl_factory_po' => $row['factory_po'],
            'pl_sku' => $row['style'],
            'pl_material' => $row['material'],
            'pl_description' => $row['material_description'],
            'pl_color' => $row['color_description'],
            'pl_style_size' => $row['style_size'],
            'pl_country' => $country,
            'pl_destination' => $destination,
            'pl_crd' => $crd,
            'pl_pre_pack' => (int)$row['prepack'],
            'pl_type' => $this->type,
            'pl_brand' => $this->brand,
            'pl_shipment_mode' => $row['shipment_mode'],
            'pl_season' => $row['season'],
            'pl_order_quantity' => $row['quantity'],
            'pl_batch' => $this->batch,
            'pl_number_batch' => $number_batch,
            'pl_uniq_number_batch' => $this->uniq,
            'user_id' => $this->user,
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }

    protected function convertDate($crd){
      return $crd = Carbon::instance(Date::excelToDateTimeObject($crd));
    }

    protected function getPlType($brandntype){

        return explode('-',$brandntype)[1];

    }

    protected function getPlBrand($brandntype){

        return explode('-',$brandntype)[0];
    }

    protected function getPlNumberBatch($crd,$country,$prepack,$pocut,$type){
//            dd($type);
        if($type == "EQUIPMENT"){
           $pl_number_batch = PackingList::where([
                ['pl_batch', $this->batch],

                ['pl_crd', $crd],
                ['pl_country',$country],
               ['pl_pre_pack',$prepack]
            ])->first();
        }elseif($type == "APPAREL"){
            $pl_number_batch = PackingList::where([
                ['pl_batch', $this->batch],

                ['pl_po_cut', $pocut],
                ['pl_pre_pack',$prepack]
            ])->first();
        }

        if($pl_number_batch == null){
            return $this->number_batch++;
        }

        return $pl_number_batch->pl_number_batch;

    }



    protected function getDestination($country){

        $destination = Destination::where('customer_name',$country)->first();

        if($destination == null){
            return "";
        }

        return $destination->destination;
    }

}
