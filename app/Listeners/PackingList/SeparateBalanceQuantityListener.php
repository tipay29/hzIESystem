<?php

namespace App\Listeners\PackingList;

use App\Events\PackingList\GetPackingListDataOneEvent;
use App\Models\Carton;
use App\Models\PackingList;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use function Spatie\Ignition\Config\toArray;

class SeparateBalanceQuantityListener
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

    public function handle(GetPackingListDataOneEvent $event)
    {
        //PACKINGLIST
        $packinglistsRaw = PackingList::with('user')->where(
            [
                ['pl_batch', $event->batch],
                ['pl_number_batch', $event->number],
            ]
        )
            ->orderBy('pl_sku','ASC')
            ->get();

        $packinglistsRawCount = count($packinglistsRaw)-1;

        $packinglists = collect();

        $packinglistArray = array();
        //PACKINGLIST
        $carton_number = 0;


        //get carton all
        $cartons = Carton::all();
//        for($x = 0; $x <= $packinglistsRawCount; $x++ ){
//            $style_code = substr($packinglistsRaw[$x]->pl_sku,-5);
//            dump($style_code);
//        }



        for($x = 0; $x <= $packinglistsRawCount; $x++ ){

            $packinglistArray[$x]['id'] = $packinglistsRaw[$x]->id;
            $packinglistArray[$x]['pl_master_po'] = $packinglistsRaw[$x]->pl_master_po;
            $packinglistArray[$x]['pl_po_cut'] = $packinglistsRaw[$x]->pl_po_cut;
            $packinglistArray[$x]['pl_factory_po'] = $packinglistsRaw[$x]->pl_factory_po;
            $packinglistArray[$x]['pl_sku'] = $packinglistsRaw[$x]->pl_sku;
            $packinglistArray[$x]['pl_material'] = $packinglistsRaw[$x]->pl_material;
            $packinglistArray[$x]['pl_description'] = $packinglistsRaw[$x]->pl_description;
            $packinglistArray[$x]['pl_color'] = $packinglistsRaw[$x]->pl_color;
            $packinglistArray[$x]['pl_style_size'] = $packinglistsRaw[$x]->pl_style_size;
            $packinglistArray[$x]['pl_country'] = $packinglistsRaw[$x]->pl_country;
            $packinglistArray[$x]['pl_country_two'] = $packinglistsRaw[$x]->pl_country_two;
            $packinglistArray[$x]['pl_destination'] = $packinglistsRaw[$x]->pl_destination;
            $packinglistArray[$x]['pl_crd'] = $packinglistsRaw[$x]->pl_crd;
            $packinglistArray[$x]['pl_pre_pack'] = $packinglistsRaw[$x]->pl_pre_pack;
            $packinglistArray[$x]['pl_type'] = $packinglistsRaw[$x]->pl_type;
            $packinglistArray[$x]['pl_brand'] = $packinglistsRaw[$x]->pl_brand;
            $packinglistArray[$x]['pl_remarks'] = $packinglistsRaw[$x]->pl_remarks;
            $packinglistArray[$x]['pl_remarks_two'] = $packinglistsRaw[$x]->pl_remarks_two;
            $packinglistArray[$x]['pl_special_packs'] = $packinglistsRaw[$x]->pl_special_packs;
            $packinglistArray[$x]['pl_season'] = $packinglistsRaw[$x]->pl_season;
            $packinglistArray[$x]['pl_shipment_mode'] = $packinglistsRaw[$x]->pl_shipment_mode;
            $packinglistArray[$x]['pl_status'] = $packinglistsRaw[$x]->pl_status;
            $packinglistArray[$x]['pl_batch'] = $packinglistsRaw[$x]->pl_batch;
            $packinglistArray[$x]['pl_number_batch'] = $packinglistsRaw[$x]->pl_number_batch;
            $packinglistArray[$x]['pl_version'] = $packinglistsRaw[$x]->pl_version;
            $packinglistArray[$x]['user_id'] = $packinglistsRaw[$x]->user_id;
            $packinglistArray[$x]['pl_buy_year'] = $packinglistsRaw[$x]->pl_buy_year;
            $packinglistArray[$x]['pl_buy_month'] = $packinglistsRaw[$x]->pl_buy_month;

            $iqty = $packinglistsRaw[$x]->pl_order_quantity;
            $packinglistArray[$x]['pl_order_quantity'] = $iqty;

            $prepack = $packinglistArray[$x]['pl_pre_pack'];
//            $style_code = ltrim(substr($packinglistsRaw[$x]->pl_sku,-5),0);
//            dd(substr($packinglistsRaw[$x]->pl_material,-8));

             if($packinglistsRaw[$x]->pl_version == 1){
                $style_code = ltrim(substr($packinglistsRaw[$x]->pl_sku,-5),0);
             }elseif($packinglistsRaw[$x]->pl_version == 2){
                 $style_code = ltrim($packinglistsRaw[$x]->pl_material);
             }elseif($packinglistsRaw[$x]->pl_version == 3){
                 $style_code = ltrim(substr($packinglistsRaw[$x]->pl_sku,-5),0)
                     . $packinglistArray[$x]['pl_buy_year'] . $packinglistArray[$x]['pl_buy_month'] ;
             }elseif($packinglistsRaw[$x]->pl_version == 4){
                 $style_code = ltrim(substr($packinglistsRaw[$x]->pl_material,-8),0)
                     . $packinglistArray[$x]['pl_buy_year'] . $packinglistArray[$x]['pl_buy_month'] . 'DEST';
             }elseif($packinglistsRaw[$x]->pl_version == 5){
                 $style_code = ltrim(substr($packinglistsRaw[$x]->pl_material,-8),0)
                     . $packinglistArray[$x]['pl_buy_year'] . $packinglistArray[$x]['pl_buy_month']
                     . $packinglistArray[$x]['pl_po_cut'];
             }elseif($packinglistsRaw[$x]->pl_version == 6){
                 $style_code = ltrim(substr($packinglistsRaw[$x]->pl_sku,-5))
                     . $packinglistArray[$x]['pl_buy_year'] . $packinglistArray[$x]['pl_buy_month']
                     . explode(' ',trim($packinglistArray[$x]['pl_country']))[0];
             }


//            dd($style_code);

            if($this->balance_qty == 0){
                $this->total_qty_ship = $this->total_qty_ship + $iqty;
            }

            //CHECK IF STYLE CODE HAVE OR NOT


            //GET SIZE OF THAT ROW
            $style = Style::with('sizes')->where([
                ['style_code',$style_code],
            ])->first();





            if($style == null){
                $style = Style::create([
                    'style_code' => $style_code,
                ])->load('sizes');
            }

//             dd($style);


            $packinglistArray[$x]['pl_style_id'] = $style->id;
//            dd($style);

            //2/8
            //NEED THE SIZE CAME FROM PSR OR THE DATA TEMPLATE
            //SAMPLE
            //S M XL ONLY YOU NEED TO FIND
            //BY DEFAULT WE USE ID NUMBER 4 FOR BAG SIZES OS SIZE
            //RIGHT WE NEED WHAT THE PSR OR THE DATA TEMPLATE BEEN DECLARED
            //BECAUSE PER SIZE DIFFERENT MCQ
            //THAT WOULD BE ARRAY
            //IF 3 SIZE
            //3 ARRAY OF MCQ PER CARTON

            //GET SIZE ID OF ROW OF THAT PO STYLE
//        dump($packinglistArray[$x]['pl_style_size']);
        try{
            $size_id = Size::where('size',$packinglistArray[$x]['pl_style_size'])->first()->id;

            } catch (\Exception $e) {
                    dd('Size not found in Style' . $style_code);


            }

            $packinglistArray[$x]['pl_style_size_id'] = $size_id;
            $this->sizes[$packinglistArray[$x]['pl_style_size']] = $size_id;



            // to get only that size 4 MEAN OS SIZE ONLY BAG
            $sizes = $style->sizes()->where('size_id',$size_id)->get();

            $sizesCount = count($sizes)-1;

            //check if have size or not
//                dd($sizesCount);

            //get MCQ LIST
            $mcqlistnew = array();

            for($y = 0; $y <= $sizesCount; $y++){
                $mcqlistnew[$sizes[$y]->pivot->carton_id] = $sizes[$y]->pivot->mcq;

            }

            $cartonidlist = collect(array_flip(collect($mcqlistnew)->sort()->toArray()))->values()->toArray();
            // dd($sizes);
            $mcqlist = collect($mcqlistnew)->sort()->values()->toArray();

//            dump($packinglistsRaw[$x]->pl_order_quantity);
            //get the suited carton for the quantity

            //check if mcq have if not we put blank in the else

            if(count($mcqlist) !== 0) {
                $ctrl_row_cut = 0;
                for ($z = 0; $z <= $sizesCount; $z++) {
                    // dump($z);
                    //STyle WEight with size
                    $style_weight = $sizes[$z]->pivot->weight;

                    if ($this->balance_qty !== 0) {
                        // dd($this->balance_qty);
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

                            //for sort by size
                            $packinglistArray[$x]['pl_style_size_id'] = $size_id;

                            //QTY/SHIP


                            $packinglistArray[$x]['pl_order_quantity_cut'] = ((int)floor($iqty / $mcqlist[$z])) * $mcqlist[$z];

                            //QTY / CTN
                            $packinglistArray[$x]['pl_one_ctn_item_count'] = $mcqlist[$z];
                            //NO OF CTN#
                            $packinglistArray[$x]['pl_number_of_carton'] = ((int)floor($iqty / $mcqlist[$z]));

                            //CTN#
                            $packinglistArray[$x]['carton_number_display'] = ($this->carton_number + 1) . "-" . ($this->carton_number + $packinglistArray[$x]['pl_number_of_carton']);

                            unset($packinglistArray[$x]['pl_number_of_carton']);
                            $packinglistArray[$x]['pl_number_of_carton'] = ((int)floor($iqty / $mcqlist[$z]));

                            $this->carton_number = $this->carton_number + $packinglistArray[$x]['pl_number_of_carton'];

                            //NET WEIGHT 1 CARTON
                            if($packinglistsRaw[$x]->pl_nw_one == 0 || $packinglistsRaw[$x]->pl_nw_one == null){
                                $packinglistArray[$x]['net_weight_one_ctn'] = $mcqlist[$z] * $style_weight;
                            }else{
                                $packinglistArray[$x]['net_weight_one_ctn'] = $packinglistsRaw[$x]->pl_nw_one;
                            }

                            //TOTAL NETWEIGHT ALL CARTON
                            $packinglistArray[$x]['net_weight_total'] = $packinglistArray[$x]['net_weight_one_ctn'] * $packinglistArray[$x]['pl_number_of_carton'];
                            //Total netweight
                            $this->total_nw = $this->total_nw + $packinglistArray[$x]['net_weight_total'];
                        //    dd($cartonidlist);
                            //Carton WEight

                            try{
                                $packinglistArray[$x]['carton_weight'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_weight;

                                //Carton Measurement
                                $packinglistArray[$x]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;
                            } catch (\Exception $e) {
                                dd('MCQ error for style '. $style_code );

                            }

                            if (array_key_exists($packinglistArray[$x]['carton_size'],$this->total_ctn_ctn))
                            {
                                $this->total_ctn_ctn[$packinglistArray[$x]['carton_size']] =
                                $this->total_ctn_ctn[$packinglistArray[$x]['carton_size']] +
                                $packinglistArray[$x]['pl_number_of_carton'];


                            }
                            else
                            {
                                $this->total_ctn_ctn[$packinglistArray[$x]['carton_size']] =
                                $packinglistArray[$x]['pl_number_of_carton'];
                            }

                            $this->total_ctn_mcq[$packinglistArray[$x]['carton_size']] =
                                $mcqlist[$z];


                            //GROSS WEIGHT 1 CARTON
                             if($packinglistsRaw[$x]->pl_gw_one == 0 || $packinglistsRaw[$x]->pl_gw_one == null){
                                 $packinglistArray[$x]['gross_weight_one_ctn'] =
                                     $packinglistArray[$x]['net_weight_one_ctn'] + $packinglistArray[$x]['carton_weight'];
                             }else{
                                 $packinglistArray[$x]['gross_weight_one_ctn'] = $packinglistsRaw[$x]->pl_gw_one;
                            }


                            //TOTAL GROSS WEIGHT ALL CARTON
                            $packinglistArray[$x]['gross_weight_total'] = $packinglistArray[$x]['gross_weight_one_ctn'] * $packinglistArray[$x]['pl_number_of_carton'];
                            //total gross weight
                            $this->total_gw = $this->total_gw + $packinglistArray[$x]['gross_weight_total'];


                            unset($packinglistArray[$x]['carton_size']);
                            $packinglistArray[$x]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;
                            $packinglistArray[$x]['carton_size_id'] = $cartonidlist[$z];

                            //GET CBM
                            $carton_size_value_exp = explode('*', $packinglistArray[$x]['carton_size']);
                            $carton_size_value = 1;
                            foreach ($carton_size_value_exp as $key => $value) {
                                $carton_size_value *= $value;
                            }
                            $cbm = $carton_size_value * $packinglistArray[$x]['pl_number_of_carton'] / 1000000;

                            $packinglistArray[$x]['cbm'] = $cbm;

                            //total cbm
                            $this->total_cbm = $this->total_cbm + $packinglistArray[$x]['cbm'];
                            unset($packinglistArray[$x]['cbm']);
                            $packinglistArray[$x]['cbm'] = round($cbm, 2);
                            $packinglistArray[$x]['row_cut'] = 1;

                            $packinglists->add($packinglistArray[$x]);

                            $this->balance_qty = $iqty - $packinglistArray[$x]['pl_order_quantity_cut'];

                            if ($this->balance_qty !== 0) {
                                $x--;
                            }

                        } elseif($iqty < $mcqlist[$z] || $ctrl_row_cut === 1) {

                            //aadd to sort nice

                            if($packinglistArray[$x]['pl_style_size'] !== 'OS'){
                                $packinglistArray[$x]['pl_style_size_id'] = $size_id + 0.1;
                            }
                            //QTY/SHIP
                            $packinglistArray[$x]['pl_order_quantity_cut'] = $iqty;
                            //QTY / CTN
                            $packinglistArray[$x]['pl_one_ctn_item_count'] = $iqty;
                            //NO OF CTN#
                            $packinglistArray[$x]['pl_number_of_carton'] = 1;
                            //CTN#
                            $packinglistArray[$x]['carton_number_display'] = ($this->carton_number + 1) . "-" . ($this->carton_number + $packinglistArray[$x]['pl_number_of_carton']);

//                            unset($packinglistArray[$x]['pl_number_of_carton']);
//                            $packinglistArray[$x]['pl_number_of_carton'] = 1;

                            $this->carton_number = $this->carton_number + $packinglistArray[$x]['pl_number_of_carton'];

                            //NET WEIGHT 1 CARTON
                            if($packinglistsRaw[$x]->pl_nw_two == 0 || $packinglistsRaw[$x]->pl_nw_two == null){
                                $packinglistArray[$x]['net_weight_one_ctn'] = $packinglistArray[$x]['pl_order_quantity_cut'] * $style_weight;
                            }else{
                                $packinglistArray[$x]['net_weight_one_ctn'] = $packinglistsRaw[$x]->pl_nw_two;
                            }

                            //TOTAL NETWEIGHT ALL CARTON
                            $packinglistArray[$x]['net_weight_total'] = $packinglistArray[$x]['net_weight_one_ctn'] * $packinglistArray[$x]['pl_number_of_carton'];
                            //Total netweight
                            $this->total_nw = $this->total_nw + $packinglistArray[$x]['net_weight_total'];

                            try{
                            //Carton WEight
                            $packinglistArray[$x]['carton_weight'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_weight;

                            //Carton Measurement
                            $packinglistArray[$x]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;
                            }catch(\Exception $e) {
                                dd( 'Message: ' . 'MCQ error!!!');
                            }
                            if (array_key_exists($packinglistArray[$x]['carton_size'],$this->total_ctn_ctn))
                            {
                                $this->total_ctn_ctn[$packinglistArray[$x]['carton_size']] =
                                    $this->total_ctn_ctn[$packinglistArray[$x]['carton_size']] +
                                    $packinglistArray[$x]['pl_number_of_carton'];
                            }
                            else
                            {
                                $this->total_ctn_ctn[$packinglistArray[$x]['carton_size']] =
                                    $packinglistArray[$x]['pl_number_of_carton'];
                            }
                            $this->total_ctn_mcq[$packinglistArray[$x]['carton_size']] =
                                $mcqlist[$z];

                            //GROSS WEIGHT 1 CARTON
                            if($packinglistsRaw[$x]->pl_gw_two == 0 || $packinglistsRaw[$x]->pl_gw_two == null){
                                $packinglistArray[$x]['gross_weight_one_ctn'] =
                                    $packinglistArray[$x]['net_weight_one_ctn'] + $packinglistArray[$x]['carton_weight'];
                            }else{
                                $packinglistArray[$x]['gross_weight_one_ctn'] = $packinglistsRaw[$x]->pl_gw_two;
                            }

                            //TOTAL GROSS WEIGHT ALL CARTON
                            $packinglistArray[$x]['gross_weight_total'] = $packinglistArray[$x]['gross_weight_one_ctn'] * $packinglistArray[$x]['pl_number_of_carton'];
                            //total gross weight
                            $this->total_gw = $this->total_gw + $packinglistArray[$x]['gross_weight_total'];

                            unset($packinglistArray[$x]['carton_size']);
                            $packinglistArray[$x]['carton_size'] = $cartons->where('id', $cartonidlist[$z])->first()->ctn_size;
                            $packinglistArray[$x]['carton_size_id'] = $cartonidlist[$z];
                            //GET CBM
                            $carton_size_value_exp = explode('*', $packinglistArray[$x]['carton_size']);
                            $carton_size_value = 1;
                            foreach ($carton_size_value_exp as $key => $value) {
                                $carton_size_value *= $value;
                            }
                            $cbm = $carton_size_value * $packinglistArray[$x]['pl_number_of_carton'] / 1000000;

                            $packinglistArray[$x]['cbm'] = $cbm;

                            //total cbm
                            $this->total_cbm = $this->total_cbm + $packinglistArray[$x]['cbm'];
                            unset($packinglistArray[$x]['cbm']);
                            $packinglistArray[$x]['cbm'] = round($cbm, 2);

                            $packinglistArray[$x]['row_cut'] = 2;

                            $packinglists->add($packinglistArray[$x]);
                        }

                        $z = $sizesCount + 1;

                    }

                }

            }else{
                //QTY/SHIP
                $packinglistArray[$x]['pl_order_quantity_cut'] = $iqty;
                //QTY / CTN
                $packinglistArray[$x]['pl_one_ctn_item_count'] = 0;

                //CTN#
                $packinglistArray[$x]['carton_number_display'] = "";
                //NO OF CTN#
                $packinglistArray[$x]['pl_number_of_carton'] =  0;

                $this->carton_number = $this->carton_number + 0;

                //NET WEIGHT 1 CARTON
                $packinglistArray[$x]['net_weight_one_ctn'] = 0;
                //TOTAL NETWEIGHT ALL CARTON
                $packinglistArray[$x]['net_weight_total'] = 0;
                //Total netweight
                $this->total_nw = $this->total_nw + 0;

                //Carton WEight
                $packinglistArray[$x]['carton_weight'] = 0;


                //GROSS WEIGHT 1 CARTON
                $packinglistArray[$x]['gross_weight_one_ctn'] = 0;

                //TOTAL GROSS WEIGHT ALL CARTON
                $packinglistArray[$x]['gross_weight_total'] = 0;
                //total gross weight
                $this->total_gw = $this->total_gw + 0;

                //Carton Measurement
                $packinglistArray[$x]['carton_size'] = "";
                $packinglistArray[$x]['carton_size_id'] = "";


                //GET CBM
                $cbm = 0;
                $packinglistArray[$x]['cbm'] = round($cbm, 2);
                //total cbm
                $this->total_cbm = $this->total_cbm + 0;

                $packinglistArray[$x]['row_cut'] = 1;

                $packinglists->add($packinglistArray[$x]);


            }


        }

//        dd($packinglists);
//        dd($packinglists);
        $packinglists = collect($packinglists->sortBy('pl_style_size_id')->values()->toArray());

        $pl_last_num = count($packinglistArray) + 1;

        $packinglistArray[$pl_last_num]['total_qty_ship'] = $this->total_qty_ship;
        $packinglistArray[$pl_last_num]['total_carton'] = $this->carton_number;
        $packinglistArray[$pl_last_num]['total_gw'] = $this->total_gw;
        $packinglistArray[$pl_last_num]['total_nw'] = $this->total_nw;
        $packinglistArray[$pl_last_num]['total_cbm'] = $this->total_cbm;
        $packinglistArray[$pl_last_num]['total_ctn_ctn'] = $this->total_ctn_ctn;
        $packinglistArray[$pl_last_num]['total_ctn_mcq'] = $this->total_ctn_mcq;

//        dd($packinglistsRaw[0]->pl_type);
        if($packinglistsRaw[0]->pl_type == "APPAREL"){
//        dd($packinglistsRaw);
        $sizevalues = array_values(array_flip(collecT($this->sizes)->sort()->toArray()));
        $newsizeValues = array();
            foreach($sizevalues as $key => $sizevalue){

                for($x=0; $x < count($packinglistsRaw);$x++){
                    if($packinglistsRaw[$x]->pl_style_size == $sizevalue){
                        $newsizeValues[$key] = $packinglistsRaw[$x]->pl_order_quantity;
                    }
                }

            }
        }else{
            $newsizeValues = array();
        }


//        dd($packinglistsRaw);

        $packinglistArray[$pl_last_num]['pl_ctn_list'] = array_values(array_flip(collect($this->sizes)->sort()->toArray()));
        $packinglistArray[$pl_last_num]['pl_size_value_list'] = $newsizeValues;



        $packinglists->add($packinglistArray[$pl_last_num]);
        //dd(array_flip($this->sizes));
        $packinglistArray[$pl_last_num]['summary'] = $this->getSummary(array_values($packinglists->toArray()));
        $packinglistArray[$pl_last_num]['mcqcarton_details'] = $this->getMCQDetails(array_values($packinglists->toArray()));
        $packinglists = $packinglists->slice(0, -1);

        $packinglists->add( $packinglistArray[$pl_last_num]);


        return $packinglists;

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


                if($packinglists[0]['pl_type'] === "APPAREL"){
                    $key = $packinglists[$x]['pl_style_size'] . $packinglists[$x]['carton_size'];

                    if(!$mcqdetails->contains('key',$key)){
                        $mcqrow['key'] = $key;
                        $mcqrow['basis'] = $packinglists[$x]['pl_style_size'];
                        $mcqrow['carton_size'] = $packinglists[$x]['carton_size'];
                        $mcqrow['carton_size_id'] = $packinglists[$x]['carton_size_id'];
                        if(!isset($mcq->mcq)){
//                            dd($size_style_carton_id);
                            $mcq = '';
                        }else{
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

    protected function getSummary($packinglists){


        if($packinglists[0]['pl_type'] == "APPAREL"){
            $bases = $packinglists[count($packinglists)-1]['pl_ctn_list'];

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
//        dd($packinglists);
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

//        dd($summary);
        return $summary;
    }
}
