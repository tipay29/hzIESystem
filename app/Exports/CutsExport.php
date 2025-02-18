<?php

namespace App\Exports;

use App\Models\Cut;
use App\Models\FabricCode;
use App\Models\FabricColor;
use App\Models\FabricType;
use App\Models\Placement;
use App\Models\PurchaseOrder;
use App\Models\Style;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CutsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $dates;

    public function __construct($dates)
    {
        $this->dates = $dates;
    }

    public function collection()
    {
//        $cuts = Cut::select('building_id','table_num','work_hours','marker_length','layer_count','part_count','size_ratio',
//            'spread_start','spread_end','cut_start','cut_end','machine_auto')
//            ->whereBetween('spread_start', $this->dates['dr_date_one'], $this->dates['dr_date_two'])
//            ->with([
//                'styles','purchase_orders','fabric_codes',
//                'fabric_colors','fabric_types','placements',
//
//            ])
//            ->get();
//
//        dd($cuts);
        $cuts = $this->getCuts($this->dates['dr_date_one'],$this->dates['dr_date_two']);
//
//        return $cuts;

        return $cuts;
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
            'Machine Auto',
            'Material',
            'PO',
            'Color Code',
            'Fabric Color',
            'Fabric Code',
            'Fabric Type',
        ];
    }

    private function getCuts($dr_date_one, $dr_date_two)
    {
//        dd('aw');
        $cuts = Cut::select('building_id','table_num','work_hours','marker_length','layer_count','part_count','size_ratio',
            'spread_start','spread_end','cut_start','cut_end','machine_auto')
            ->whereBetween('spread_start', [$dr_date_one, $dr_date_two])
            ->get();




        $cutscollect = collect();

        foreach($cuts as $cut){
            $style = '';
            $po = '';
            $placement= '';
            $fabric_color = '';
            $fabric_code = '';
            $fabric_type = '';
            $cutform = $cut;

            $cutdbs = DB::table('cuttables')
                ->where('cut_id', 1)
                ->get()->toArray();

            foreach($cutdbs as $cutdb){
                $db_word = explode('\\',$cutdb->cuttable_type)[2];
                if($db_word == 'Style'){
                    $style = $style . ',' . Style::where('id',$cutdb->cuttable_id)->first()->style_code;
                }
                if($db_word == 'PurchaseOrder'){
                    $po = $po . ' ' . PurchaseOrder::where('id',$cutdb->cuttable_id)->first()->purchase_order;
                }
                if($db_word == 'Placement'){
                    $placement = $placement . ',' . Placement::where('id',$cutdb->cuttable_id)->first()->placement;
                }
                if($db_word == 'FabricColor'){
                    $fabric_color = $fabric_color . ',' . FabricColor::where('id',$cutdb->cuttable_id)->first()->fabric_color;
                }
                if($db_word == 'FabricCode'){
                    $fabric_code = $fabric_code . ',' . FabricCode::where('id',$cutdb->cuttable_id)->first()->fabric_code;
                }
                if($db_word == 'FabricType'){
                    $fabric_type = $fabric_type . ',' . FabricType::where('id',$cutdb->cuttable_id)->first()->fabric_type;
                }
            }

            $cutform['style'] = $style;
            $cutform['po'] = $po;
            $cutform['placement'] = $placement;
            $cutform['fabric_color'] = $fabric_color;
            $cutform['fabric_code'] = $fabric_code;
            $cutform['fabric_type'] = $fabric_type;


            $cutscollect->add($cutform);
        }

        return $cuts;
    }
}
