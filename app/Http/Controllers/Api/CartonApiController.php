<?php

namespace App\Http\Controllers\Api;

use App\Events\Carton\GetPLCartonOrderFormEvent;
use App\Events\PackingList\GetPackingListDataAllEvent;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Carton;
use App\Models\PackingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartonApiController extends Controller
{
    public function showBrand(){

        $brand = Brand::where('brand_name',request()->brand)->first();

        $cartons = Carton::where(
        [
        ['brand_id',$brand->id],
        ['type',request()->type],
        ])->get();

        return response()->json($cartons,200);
    }

    public function createCartonOrder(){

       $carton_pl_infos = PackingList::where([
            ['pl_brand', request()->brand],
            ['pl_type', request()->type],
            ['pl_buy_year', request()->year],
            ['pl_buy_month', request()->month],
        ])->get();

        $packinglists = event(new GetPLCartonOrderFormEvent(request()->all()));

        $cartonForm = $this->getCartonForm($packinglists);
//        $excel = Excel::download(new PackingListMultiSheetExport($packinglists), 'pls.xlsx');


        return response()->json($packinglists,200);
    }

    protected function getCartonForm($packinglists){

//        dd($packinglists);
        $bases = [];
        $plrow = [];
        $ctn_order = collect();
        for($x = 0; $x < count($packinglists);$x++){

            for($y = 0; $y < count($packinglists[$x]); $y++){

                if($y !== count($packinglists[$x])-1) {

                    $key =  $packinglists[$x][$y]['pl_factory_po'] . '-' .
                        $packinglists[$x][$y]['pl_master_po'] . '-' .
                        $packinglists[$x][$y]['pl_material'] . '-'. $packinglists[$x][$y]['pl_style_size'] . '-' . $packinglists[$x][$y]['carton_size'] ;

                    if(!array_key_exists($key,$bases)){
//                        array_push($bases,$key);
//                        dump($key);

                        $plrow[$key]['ctn_factory_po'] = $packinglists[$x][$y]['pl_factory_po'];
                        $plrow[$key]['ctn_master_po'] = $packinglists[$x][$y]['pl_master_po'];
                        $plrow[$key]['ctn_material'] = $packinglists[$x][$y]['pl_material'];
                        $plrow[$key]['ctn_size'] = $packinglists[$x][$y]['pl_style_size'];
                        $plrow[$key]['ctn_quantity'] = $packinglists[$x][$y]['pl_number_of_carton'];
                        $plrow[$key]['ctn_carton'] = $packinglists[$x][$y]['carton_size'];
                        $plrow[$key]['ctn_pl_quantity'] = $packinglists[$x][$y]['pl_order_quantity_cut'];

                        $size_style_carton_id =
                            round($packinglists[$x][$y]['pl_style_size_id']) . $packinglists[$x][$y]['pl_style_id']
                            . $packinglists[$x][$y]['carton_size_id'];

                        $mcq = DB::table('sizeables')->where('size_style_carton_id',$size_style_carton_id)->first();
                        if(!isset($mcq->mcq)){
//                            dd($size_style_carton_id);
                            $mcq = '';
                        }else{
                            $mcq = $mcq->mcq;
                        }

                        $plrow[$key]['ctn_mcq'] = $mcq;

                    }
                    elseif(array_key_exists($key,$bases)){

                        $plrow[$key]['ctn_quantity'] = $plrow[$key]['ctn_quantity'] + $packinglists[$x][$y]['pl_number_of_carton'];
                        $plrow[$key]['ctn_pl_quantity'] = $plrow[$key]['ctn_pl_quantity'] + $packinglists[$x][$y]['pl_order_quantity_cut'];

                    }

//                    $ctn_order->add($plrow);
                }


            }

        }

//        dd($plrow);
        $ctn_order->add($plrow);

        return $packinglists;
    }
}
