<?php

namespace App\Listeners\PackingList;

use App\Events\PackingList\GetPackingListDataAllEvent;
use App\Events\PackingList\GetPackingListDataOneEvent;
use App\Models\Carton;
use App\Models\PackingList;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SeparateBalanceQuantityAllListener
{
    protected $balance_qty;
    protected $carton_number;
    protected $total_qty_ship;
    protected $total_ctn;
    protected $total_nw;
    protected $total_gw;
    protected $total_cbm;
    protected $total_ctn_ctn;
    protected  $total_ctn_mcq;
    protected $sizes;

    public function __construct()
    {
        $this->balance_qty = 0;
        $this->carton_number = 0;
        $this->total_qty_ship = 0;
        $this->total_ctn = 0;
        $this->total_nw = 0;
        $this->total_gw = 0;
        $this->total_cbm = 0;
        $this->total_ctn_ctn = array();
        $this->total_ctn_mcq = array();
        $this->sizes = array();
    }

    public function handle(GetPackingListDataAllEvent $event)
    {

        //PACKINGLIST
        $packinglistsBatchRaw = PackingList::with('user')->where(
            [
                ['pl_batch', $event->batch],
            ]
        )
//            ->orderBy('pl_sku','ASC')
            ->get();

        $number_batch_max = $packinglistsBatchRaw->max('pl_number_batch');

        $packinglists = collect();
        $packinglistArray = array();

        //get carton all
        $cartons = Carton::all();

        for($x=0;$x < $number_batch_max;$x++){

            $number_number_collection = $packinglistsBatchRaw->where('pl_number_batch',$x+1)->values();

            $number_number_count = count($number_number_collection);
//            dump($number_number_collection);
            $y_Ctrl = -1;

            for($y=0 ; $y < $number_number_count; $y++){
                $y_Ctrl++;
                $packinglistArray[$x][$y_Ctrl]['pl_master_po'] = $number_number_collection[$y]->pl_master_po;
                $packinglistArray[$x][$y_Ctrl]['pl_po_cut'] = $number_number_collection[$y]->pl_po_cut;
                $packinglistArray[$x][$y_Ctrl]['pl_factory_po'] = $number_number_collection[$y]->pl_factory_po;
                $packinglistArray[$x][$y_Ctrl]['pl_sku'] = $number_number_collection[$y]->pl_sku;
                $packinglistArray[$x][$y_Ctrl]['pl_material'] = $number_number_collection[$y]->pl_material;
                $packinglistArray[$x][$y_Ctrl]['pl_description'] = $number_number_collection[$y]->pl_description;
                $packinglistArray[$x][$y_Ctrl]['pl_color'] = $number_number_collection[$y]->pl_color;
                $packinglistArray[$x][$y_Ctrl]['pl_style_size'] = $number_number_collection[$y]->pl_style_size;
                $packinglistArray[$x][$y_Ctrl]['pl_country'] = $number_number_collection[$y]->pl_country;
                $packinglistArray[$x][$y_Ctrl]['pl_country_two'] = $number_number_collection[$y]->pl_country_two;
                $packinglistArray[$x][$y_Ctrl]['pl_destination'] = $number_number_collection[$y]->pl_destination;
                $packinglistArray[$x][$y_Ctrl]['pl_crd'] = $number_number_collection[$y]->pl_crd;
                $packinglistArray[$x][$y_Ctrl]['pl_pre_pack'] = $number_number_collection[$y]->pl_pre_pack;
                $packinglistArray[$x][$y_Ctrl]['pl_type'] = $number_number_collection[$y]->pl_type;
                $packinglistArray[$x][$y_Ctrl]['pl_brand'] = $number_number_collection[$y]->pl_brand;
                $packinglistArray[$x][$y_Ctrl]['pl_remarks'] = $number_number_collection[$y]->pl_remarks;
                $packinglistArray[$x][$y_Ctrl]['pl_remarks_two'] = $number_number_collection[$y]->pl_remarks_two;
                $packinglistArray[$x][$y_Ctrl]['pl_special_packs'] = $number_number_collection[$y]->pl_special_packs;
                $packinglistArray[$x][$y_Ctrl]['pl_status'] = $number_number_collection[$y]->pl_status;
                $packinglistArray[$x][$y_Ctrl]['pl_shipment_mode'] = $number_number_collection[$y]->pl_shipment_mode;
                $packinglistArray[$x][$y_Ctrl]['pl_season'] = $number_number_collection[$y]->pl_season;
                $packinglistArray[$x][$y_Ctrl]['pl_batch'] = $number_number_collection[$y]->pl_batch;
                $packinglistArray[$x][$y_Ctrl]['pl_number_batch'] = $number_number_collection[$y]->pl_number_batch;
                $packinglistArray[$x][$y_Ctrl]['user_id'] = $number_number_collection[$y]->user_id;
                $packinglistArray[$x][$y_Ctrl]['pl_nw_one'] = $number_number_collection[$y]->pl_nw_one;
                $packinglistArray[$x][$y_Ctrl]['pl_nw_two'] = $number_number_collection[$y]->pl_nw_two;
                $packinglistArray[$x][$y_Ctrl]['pl_gw_one'] = $number_number_collection[$y]->pl_gw_one;
                $packinglistArray[$x][$y_Ctrl]['pl_gw_two'] = $number_number_collection[$y]->pl_gw_two;

                $iqty = $number_number_collection[$y]->pl_order_quantity;
                $packinglistArray[$x][$y_Ctrl]['pl_order_quantity'] = $iqty;

                $prepack = $packinglistArray[$x][$y_Ctrl]['pl_pre_pack'];

                $style_code = ltrim(substr($number_number_collection[$y]->pl_sku,-5),0);

                if($this->balance_qty == 0){
                    $this->total_qty_ship = $this->total_qty_ship + $iqty;
                }




                //GET SIZE OF THAT ROW
                $style = Style::with('sizes')->where([
                    ['style_code',$style_code],
                ])->first();

                if($style == null){
                    $style = Style::create([
                        'style_code' => $style_code,
                    ])->load('sizes');
                }

                $packinglistArray[$x][$y_Ctrl]['pl_style_id'] = $style->id;

//                dd(trim($packinglistArray[$x][$y_Ctrl]['pl_style_size']));
//                dump($packinglistArray[$x][$y_Ctrl]['pl_style_size']);
                //GET SIZE ID OF ROW OF THAT PO STYLE
                try {
//                dump($packinglistArray[$x][$y_Ctrl]['pl_style_size']);
                $size_id = Size::where('size',$packinglistArray[$x][$y_Ctrl]['pl_style_size'])->first()->id;
//$size_id = 1;
                } catch (\Exception $e) {

                   dd($e->getMessage());
                }





                $packinglistArray[$x][$y_Ctrl]['pl_style_size_id'] = $size_id;
                $this->sizes[$packinglistArray[$x][$y_Ctrl]['pl_style_size']] = $size_id;
                // to get only that size 4 MEAN OS SIZE ONLY BAG
                $sizes = $style->sizes()->where('size_id',$size_id)->get();

                $sizesCount = count($sizes)-1;

                //get MCQ LIST
                $mcqlistnew = array();


                for($i = 0; $i <= $sizesCount; $i++){
                    $mcqlistnew[$sizes[$i]->pivot->carton_id] = $sizes[$i]->pivot->mcq;

                }


                $cartonidlist = collect(array_flip(collect($mcqlistnew)->sort()->toArray()))->values()->toArray();

                $mcqlist = collect($mcqlistnew)->sort()->values()->toArray();
//                dd($mcqlist);

                //check if mcq have if not we put blank in the else
                if(count($mcqlist) !== 0) {


                    for ($z = 0; $z <= $sizesCount; $z++) {

                        //STyle WEight with size
                        $style_weight = $sizes[$z]->pivot->weight;
                        $ctrl_row_cut = 0;
                        if ($this->balance_qty !== 0) {
                            $iqty = $this->balance_qty;
                            $this->balance_qty = 0;
                            $ctrl_row_cut = 1;
                        }

                        //get proper MCQ
                        if ($iqty <= $mcqlist[$z] || $z == $sizesCount) {

                            //get MCQ with PREPACK
                            if ($prepack !== null && $prepack !== 0) {
                                $mcqlist[$z] = (int)floor(($mcqlist[$z] / $prepack)) * $prepack;
                            }

                            //1st batch
                            if ($iqty >= $mcqlist[$z] && $ctrl_row_cut === 0) {


                                $packinglistArray[$x][$y_Ctrl]['pl_style_size_id'] = $size_id;
                                //QTY/SHIP
                                $packinglistArray[$x][$y_Ctrl]['pl_order_quantity_cut'] = ((int)floor($iqty / $mcqlist[$z])) * $mcqlist[$z];
                                //QTY / CTN
                                $packinglistArray[$x][$y_Ctrl]['pl_one_ctn_item_count'] = $mcqlist[$z];
                                //NO OF CTN#
                                $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] = ((int)floor($iqty / $mcqlist[$z]));
                                //CTN#
                                $packinglistArray[$x][$y_Ctrl]['carton_number_display'] = ($this->carton_number + 1) . "-" . ($this->carton_number + $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton']);

                                unset($packinglistArray[$x][$y_Ctrl]['pl_number_of_carton']);
                                $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] = ((int)floor($iqty / $mcqlist[$z]));

                                $this->carton_number = $this->carton_number + $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];

                                //NET WEIGHT 1 CARTON
//                                $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = $mcqlist[$z] * $style_weight;
                                //NET WEIGHT 1 CARTON
                                if($packinglistArray[$x][$y_Ctrl]['pl_nw_one'] == 0 || $packinglistArray[$x][$y_Ctrl]['pl_nw_one'] == null){
                                    $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = $mcqlist[$z] * $style_weight;
                                }else{
                                    $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = $packinglistArray[$x][$y_Ctrl]['pl_nw_one'];
                                }

                                //TOTAL NETWEIGHT ALL CARTON
                                $packinglistArray[$x][$y_Ctrl]['net_weight_total'] = $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] * $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                //Total netweight
                                $this->total_nw = $this->total_nw + $packinglistArray[$x][$y_Ctrl]['net_weight_total'];

                                //Carton WEight
                                $packinglistArray[$x][$y_Ctrl]['carton_weight'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_weight;

                                //Carton Measurement
                                $packinglistArray[$x][$y_Ctrl]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;

                                if (array_key_exists($packinglistArray[$x][$y_Ctrl]['carton_size'] ,$this->total_ctn_ctn))
                                {
                                    $this->total_ctn_ctn[$packinglistArray[$x][$y_Ctrl]['carton_size']] =
                                    $this->total_ctn_ctn[$packinglistArray[$x][$y_Ctrl]['carton_size']] +
                                    $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                }
                                else
                                {
                                    $this->total_ctn_ctn[$packinglistArray[$x][$y_Ctrl]['carton_size']] =
                                    $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                }

                                $this->total_ctn_mcq[$packinglistArray[$x][$y_Ctrl]['carton_size']] =
                                    $mcqlist[$z];



                                //GROSS WEIGHT 1 CARTON

                                if($packinglistArray[$x][$y_Ctrl]['pl_gw_one'] == 0 || $packinglistArray[$x][$y_Ctrl]['pl_gw_one'] == null){
                                    $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] =
                                        $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] + $packinglistArray[$x][$y_Ctrl]['carton_weight'];
                                }else{
                                    $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] = $packinglistArray[$x][$y_Ctrl]['pl_gw_one'];
                                }


                                //TOTAL GROSS WEIGHT ALL CARTON
                                $packinglistArray[$x][$y_Ctrl]['gross_weight_total'] = $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] * $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                //total gross weight
                                $this->total_gw = $this->total_gw + $packinglistArray[$x][$y_Ctrl]['gross_weight_total'];

                                unset($packinglistArray[$x][$y_Ctrl]['carton_size']);
                                $packinglistArray[$x][$y_Ctrl]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;
                                $packinglistArray[$x][$y_Ctrl]['carton_size_id'] = $cartonidlist[$z];
                                //GET CBM
                                $carton_size_value_exp = explode('*', $packinglistArray[$x][$y_Ctrl]['carton_size']);
                                $carton_size_value = 1;
                                foreach ($carton_size_value_exp as $key => $value) {
                                    $carton_size_value *= $value;
                                }
                                $cbm = $carton_size_value * $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] / 1000000;

                                $packinglistArray[$x][$y_Ctrl]['cbm'] = round($cbm, 2);

                                //total cbm
                                $this->total_cbm = $this->total_cbm + $packinglistArray[$x][$y_Ctrl]['cbm'];

//                            $packinglists->add($packinglistArray[$x]);

                                $packinglistArray[$x][$y_Ctrl]['row_cut'] = 1;

//                                $packinglists->add();

                                $this->balance_qty = $iqty - $packinglistArray[$x][$y_Ctrl]['pl_order_quantity_cut'];

                                if ($this->balance_qty !== 0) {
                                    $y--;
                                }

                            } else {

                                if($packinglistArray[$x][$y_Ctrl]['pl_style_size'] !== "OS"){
                                $packinglistArray[$x][$y_Ctrl]['pl_style_size_id'] = $size_id + 0.1;
                                }
                                //QTY/SHIP
                                $packinglistArray[$x][$y_Ctrl]['pl_order_quantity_cut'] = $iqty;
                                //QTY / CTN
                                $packinglistArray[$x][$y_Ctrl]['pl_one_ctn_item_count'] = $iqty;
                                //NO OF CTN#
                                $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] = 1;
                                //CTN#
                                $packinglistArray[$x][$y_Ctrl]['carton_number_display'] = ($this->carton_number + 1) . "-" . ($this->carton_number + $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton']);

                                unset($packinglistArray[$x][$y_Ctrl]['pl_number_of_carton']);
                                $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] = 1;

                                $this->carton_number = $this->carton_number + $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];

                                //NET WEIGHT 1 CARTON
//                                $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = $iqty * $style_weight;

                                if($packinglistArray[$x][$y_Ctrl]['pl_nw_two'] == 0 || $packinglistArray[$x][$y_Ctrl]['pl_nw_two'] == null){
                                    $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = $packinglistArray[$x][$y_Ctrl]['pl_order_quantity_cut'] * $style_weight;
                                }else{
                                    $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = $packinglistArray[$x][$y_Ctrl]['pl_nw_two'];
                                }


                                //TOTAL NETWEIGHT ALL CARTON
                                $packinglistArray[$x][$y_Ctrl]['net_weight_total'] = $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] * $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                //Total netweight
                                $this->total_nw = $this->total_nw + $packinglistArray[$x][$y_Ctrl]['net_weight_total'];

                                //Carton WEight
                                $packinglistArray[$x][$y_Ctrl]['carton_weight'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_weight;

                                //Carton Measurement
                                $packinglistArray[$x][$y_Ctrl]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;

                                if (array_key_exists($packinglistArray[$x][$y_Ctrl]['carton_size'] ,$this->total_ctn_ctn))
                                {
                                    $this->total_ctn_ctn[$packinglistArray[$x][$y_Ctrl]['carton_size']] =
                                        $this->total_ctn_ctn[$packinglistArray[$x][$y_Ctrl]['carton_size']] +
                                        $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                }
                                else
                                {
                                    $this->total_ctn_ctn[$packinglistArray[$x][$y_Ctrl]['carton_size']] =
                                        $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                }

                                $this->total_ctn_mcq[$packinglistArray[$x][$y_Ctrl]['carton_size']] =
                                    $mcqlist[$z];

                                //GROSS WEIGHT 1 CARTON
                                if($packinglistArray[$x][$y_Ctrl]['pl_gw_two'] == 0 || $packinglistArray[$x][$y_Ctrl]['pl_gw_two'] == null){
                                    $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] =
                                        $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] + $packinglistArray[$x][$y_Ctrl]['carton_weight'];
                                }else{
                                    $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] = $packinglistArray[$x][$y_Ctrl]['pl_gw_two'];
                                }
                                //TOTAL GROSS WEIGHT ALL CARTON
                                $packinglistArray[$x][$y_Ctrl]['gross_weight_total'] = $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] * $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'];
                                //total gross weight
                                $this->total_gw = $this->total_gw + $packinglistArray[$x][$y_Ctrl]['gross_weight_total'];

                                unset($packinglistArray[$x][$y_Ctrl]['carton_size']);
                                $packinglistArray[$x][$y_Ctrl]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;
                                $packinglistArray[$x][$y_Ctrl]['carton_size_id'] = $cartonidlist[$z];
                                //GET CBM
                                $carton_size_value_exp = explode('*', $packinglistArray[$x][$y_Ctrl]['carton_size']);
                                $carton_size_value = 1;
                                foreach ($carton_size_value_exp as $key => $value) {
                                    $carton_size_value *= $value;
                                }
                                $cbm = $carton_size_value * $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] / 1000000;

                                $packinglistArray[$x][$y_Ctrl]['cbm'] = round($cbm, 2);

                                //total cbm
                                $this->total_cbm = $this->total_cbm + $packinglistArray[$x][$y_Ctrl]['cbm'];

                                $packinglistArray[$x][$y_Ctrl]['row_cut'] = 2;



                            }

                            $z = $sizesCount + 1;
                        }


                    }

                }else{
                    //QTY/SHIP
                    $packinglistArray[$x][$y_Ctrl]['pl_order_quantity_cut'] = $iqty;
                    //QTY / CTN
                    $packinglistArray[$x][$y_Ctrl]['pl_one_ctn_item_count'] = 0;
                    //CTN#
                    $packinglistArray[$x][$y_Ctrl]['carton_number_display'] = '';
                    //NO OF CTN#
                    $packinglistArray[$x][$y_Ctrl]['pl_number_of_carton'] = 0;


                    $this->carton_number = $this->carton_number + 0;

                    //NET WEIGHT 1 CARTON
                    $packinglistArray[$x][$y_Ctrl]['net_weight_one_ctn'] = 0;
                    //TOTAL NETWEIGHT ALL CARTON
                    $packinglistArray[$x][$y_Ctrl]['net_weight_total'] =0;
                    //Total netweight
                    $this->total_nw = $this->total_nw + 0;


                    //Carton WEight
                    $packinglistArray[$x][$y_Ctrl]['carton_weight'] = 0;



                    //GROSS WEIGHT 1 CARTON
                    $packinglistArray[$x][$y_Ctrl]['gross_weight_one_ctn'] = 0;

                    //TOTAL GROSS WEIGHT ALL CARTON
                    $packinglistArray[$x][$y_Ctrl]['gross_weight_total'] = 0;
                    //total gross weight
                    $this->total_gw = $this->total_gw +0;

                    //Carton Measurement
                    $packinglistArray[$x][$y_Ctrl]['carton_size'] = '';
                    $packinglistArray[$x][$y_Ctrl]['carton_size_id'] = '';
                    //GET CBM

                    $cbm = 0;
                    $packinglistArray[$x][$y_Ctrl]['cbm'] = round($cbm, 2);

                    //total cbm
                    $this->total_cbm = $this->total_cbm + $packinglistArray[$x][$y_Ctrl]['cbm'];

                    $packinglistArray[$x][$y_Ctrl]['row_cut'] = 1;

                }


            }

            
            $packinglistArray[$x] = collect(collect($packinglistArray[$x])->sortBy('pl_style_size_id')->values())->toArray();

            $pl_last_num = count($packinglistArray[$x]);

            $packinglistArray[$x][$pl_last_num]['total_qty_ship'] = $this->total_qty_ship;
            $packinglistArray[$x][$pl_last_num]['total_carton'] = $this->carton_number;
            $packinglistArray[$x][$pl_last_num]['total_gw'] = $this->total_gw;
            $packinglistArray[$x][$pl_last_num]['total_nw'] = $this->total_nw;
            $packinglistArray[$x][$pl_last_num]['total_cbm'] = $this->total_cbm;
            $packinglistArray[$x][$pl_last_num]['total_ctn_ctn'] = $this->total_ctn_ctn;
            $packinglistArray[$x][$pl_last_num]['total_ctn_mcq'] = $this->total_ctn_mcq;

            $sizevalues = array_values(array_flip(collecT($this->sizes)->sort()->toArray()));
            $packinglistArray[$x][$pl_last_num]['summary'] = $this->getSummary($packinglistArray[$x],$sizevalues);
//            dd($packinglistArray[$x]);
            $packinglistArray[$x][$pl_last_num]['mcqcarton_details'] = $this->getMCQDetails($packinglistArray[$x]);


            $this->total_qty_ship = 0;
            $this->carton_number = 0;
            $this->total_gw = 0;
            $this->total_nw = 0;
            $this->total_cbm = 0;
            $this->total_ctn_ctn = array();
            $this->total_ctn_mcq = array();
            $this->sizes = array();

//            $packinglists_batch->add($packinglistsBatchRaw->where('pl_number_batch',$x+1)->sort()->values()->toArray());

        }
//        $pl_last_num = count($packinglists) + 1;
//        dd($pl_last_num);

//        dd($packinglists);
//        dd($packinglistArray);
//        $packinglists = collect(collect($packinglistArray[0])->sortBy('pl_style_size_id')->values()->toArray());
        return $packinglistArray;
    }

    protected function getMCQDetails($packinglists){
        $mcqdetails = collect();
        $cartonrow  = array();

        for($x = 0; $x < count($packinglists);$x++){

            if($x !== count($packinglists)-1){
                $size_style_carton_id =
                    round($packinglists[$x]['pl_style_size_id']) . $packinglists[$x]['pl_style_id']
                    . $packinglists[$x]['carton_size_id'];

                $mcq = DB::table('sizeables')->where('size_style_carton_id',$size_style_carton_id)->first();


                if($packinglists[0]['pl_type'] === "APPAREL") {
                    $key = $packinglists[$x]['pl_style_size'] . $packinglists[$x]['carton_size'];
                    if (!$mcqdetails->contains('key', $key)) {
                        $mcqrow['key'] = $key;
                        $mcqrow['basis'] = $packinglists[$x]['pl_style_size'];
                        $mcqrow['carton_size'] = $packinglists[$x]['carton_size'];
                        $mcqrow['carton_size_id'] = $packinglists[$x]['carton_size_id'];
                        if (!isset($mcq->mcq)) {
                            $mcq = '';
                        } else {
                            $mcq = $mcq->mcq;
                        }
                        $mcqrow['mcq'] = $mcq;
                        $mcqdetails->add($mcqrow);
                    }
                }
                if($packinglists[0]['pl_type'] === "EQUIPMENT"){
                    $style_code = $packinglists[$x]['pl_sku'];
                    $key = $style_code . $packinglists[$x]['carton_size'];

                    if(!$mcqdetails->contains('key',$key)){
                        $mcqrow['key'] = $key;
                        $mcqrow['basis'] = $style_code;
                        $mcqrow['carton_size'] = $packinglists[$x]['carton_size'];
                        $mcqrow['carton_size_id'] = $packinglists[$x]['carton_size_id'];
                        if(!isset($mcq->mcq)){
                            $mcq = '';
                        }else{
                            $mcq = $mcq->mcq;
                        }
                        $mcqrow['mcq'] = $mcq;
                        $mcqdetails->add($mcqrow);
                    }
                }


                if (!array_key_exists($packinglists[$x]['carton_size'],$cartonrow))
                {
                    $cartonrow[$packinglists[$x]['carton_size']] = $packinglists[$x]['pl_number_of_carton'];
                }
                else
                {
                    $cartonrow[$packinglists[$x]['carton_size']] = $cartonrow[$packinglists[$x]['carton_size']] + $packinglists[$x]['pl_number_of_carton'];
                }

            }

        }

        $mcqcartondetail['mcq_details'] = $mcqdetails;
        $mcqcartondetail['carton_details'] = $cartonrow;
//        dd($mcqcartondetail);
        return $mcqcartondetail;
    }

    protected function getSummary($packinglists,$sizes){
        if($packinglists[0]['pl_type'] == "APPAREL"){
            $bases = $sizes;
        }elseif($packinglists[0]['pl_type'] == "EQUIPMENT"){
            $bases = [];
            for($x = 0; $x < count($packinglists);$x++){
                if($x !== count($packinglists)-1){
                    if(!in_array($packinglists[$x]['pl_material'],$bases)){
                        array_push($bases,$packinglists[$x]['pl_material']);
                    }
                }
            }
        }

        $summary = collect();
        for($m = 0;$m < count($bases);$m++){

            $plrow['pl_sku'] = '';
            $plrow['pl_material'] = '';
            $plrow['pl_description'] = '';
            $plrow['pl_color'] = '';
            $plrow['pl_size'] = '';
            $plrow['pl_quantity'] = 0;
            $plrow['pl_carton'] = 0;
            $plrow['pl_nw'] = 0;
            $plrow['pl_gw'] = 0;
            $plrow['pl_cbm'] = 0;
//            dd($packinglists);
            for($z = 0; $z < count($packinglists);$z++){

                if($z !== count($packinglists)-1){

                    if($packinglists[0]['pl_type'] == "APPAREL"){
                        if($packinglists[$z]['pl_style_size'] == $bases[$m]){

                            $plrow['pl_sku'] = $packinglists[$z]['pl_sku'];
                            $plrow['pl_material'] = $packinglists[$z]['pl_material'];
                            $plrow['pl_description'] = $packinglists[$z]['pl_description'];
                            $plrow['pl_color'] = $packinglists[$z]['pl_color'];
                            $plrow['pl_size'] = $packinglists[$z]['pl_style_size'];
                            $plrow['pl_quantity'] = $plrow['pl_quantity'] + $packinglists[$z]['pl_order_quantity_cut'];
                            $plrow['pl_carton'] = $plrow['pl_carton'] + $packinglists[$z]['pl_number_of_carton'];
                            $plrow['pl_nw'] = $plrow['pl_nw'] + $packinglists[$z]['net_weight_total'];
                            $plrow['pl_gw'] = $plrow['pl_gw'] + $packinglists[$z]['gross_weight_total'];
                            $plrow['pl_cbm'] = $plrow['pl_cbm'] + $packinglists[$z]['cbm'];
    //                        dump($materials[$m]);
                        }
                    }
                    if($packinglists[0]['pl_type'] == "EQUIPMENT"){
                        if($packinglists[$z]['pl_material'] == $bases[$m]){

                            $plrow['pl_sku'] = $packinglists[$z]['pl_sku'];
                            $plrow['pl_material'] = $packinglists[$z]['pl_material'];
                            $plrow['pl_description'] = $packinglists[$z]['pl_description'];
                            $plrow['pl_color'] = $packinglists[$z]['pl_color'];
                            $plrow['pl_size'] = $packinglists[$z]['pl_style_size'];
                            $plrow['pl_quantity'] = $plrow['pl_quantity'] + $packinglists[$z]['pl_order_quantity_cut'];
                            $plrow['pl_carton'] = $plrow['pl_carton'] + $packinglists[$z]['pl_number_of_carton'];
                            $plrow['pl_nw'] = $plrow['pl_nw'] + $packinglists[$z]['net_weight_total'];
                            $plrow['pl_gw'] = $plrow['pl_gw'] + $packinglists[$z]['gross_weight_total'];
                            $plrow['pl_cbm'] = $plrow['pl_cbm'] + $packinglists[$z]['cbm'];
                            //                        dump($materials[$m]);
                        }
                    }
                }

            }
            $summary->add($plrow);
        }


        return $summary;
    }
}



