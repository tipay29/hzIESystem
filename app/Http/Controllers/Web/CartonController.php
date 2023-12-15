<?php

namespace App\Http\Controllers\Web;

use App\Events\Carton\GetPLCartonOrderFormEvent;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Carton;
use App\Models\PackingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartonController extends Controller
{

    public function index()
    {
        $cartons = Carton::with(['brand'])->paginate(20);

        return view('carton.index', compact('cartons'));
    }

    public function create()
    {
        $carton = new Carton();

        return view('carton.create', compact('carton'));
    }

    public function store(Request $request)
    {
        $carton = Carton::create($this->requestValidate());

        return redirect(route('cartons.index'));
    }

    public function edit(Carton $carton)
    {
        return view('carton.edit',compact('carton'));
    }

    public function update(Carton $carton)
    {
        $carton->update($this->requestValidate());

        return redirect(route('cartons.index'));
    }


    public function destroy(Carton $carton)
    {
        $carton->delete();

        return redirect(route('cartons.index'));

    }

    protected function requestValidate(){
        return request()->validate([
            'brand_id' => 'required',
            'ctn_size' => 'required',
            'ctn_weight' => 'required',
        ]);
    }



    public function orderCreate()
    {
//        dd(request()->all());

//        $carton_pl_infos = PackingList::where([
//            ['pl_brand', request()->co_brand],
//            ['pl_type', request()->co_type],
//            ['pl_buy_year', request()->co_year],
//            ['pl_buy_month', request()->co_month],
//        ])->get();

//        $packinglists = event(new GetPLCartonOrderFormEvent(request()->all()));
//
//        $cartonorder = $this->getCartonForm($packinglists);

        $pl_details = request()->pl_details;

        $packinglists = collect();

//        $packinglists = array();

        for($x=0;$x < count($pl_details);$x++){

            $packinglists->add(PackingList::with('user')->where([
                ['pl_batch',explode('-',$pl_details[$x])[0]],
                ['pl_number_batch',explode('-',$pl_details[$x])[1]],
            ])->get()->toArray());
        }
        $packinglists = collect($packinglists)->flatten(1)->sortBy('pl_sku')->values();

//        dd($packinglists);
        $packinglists = event(new GetPLCartonOrderFormEvent($packinglists));

//        dd($packinglists);

        $cartonorders = collect($this->getCartonForm($packinglists));
//        dd($cartonorders);

        dd($cartonorders);
//        dd();
//        dd($cartonorders->sum('ctn_fob_all'));
        return view('carton.order-create', compact('cartonorders'));

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
                        $bases[$key] = 1;

//                        array_push($bases,$key);
//                        dump($key);
//                        dd($bases);
                        $plrow[$key]['ctn_factory_po'] = $packinglists[$x][$y]['pl_factory_po'];
                        $plrow[$key]['ctn_master_po'] = $packinglists[$x][$y]['pl_master_po'];
                        $plrow[$key]['ctn_material'] = $packinglists[$x][$y]['pl_material'];
                        $plrow[$key]['ctn_desc'] = $packinglists[$x][$y]['pl_color'];
                        $plrow[$key]['ctn_dc_code'] = explode(' ',trim($packinglists[$x][$y]['pl_country']))[0];
                        $plrow[$key]['ctn_customer_name'] = substr(strstr($packinglists[$x][$y]['pl_country']," "), 1);
                        $plrow[$key]['ctn_destination'] = $packinglists[$x][$y]['pl_destination'];
                        $plrow[$key]['ctn_style_size'] = $packinglists[$x][$y]['pl_style_size'];
                        $plrow[$key]['ctn_quantity'] = $packinglists[$x][$y]['pl_number_of_carton'];
                        $plrow[$key]['ctn_carton'] = $packinglists[$x][$y]['carton_size'];
                        $plrow[$key]['ctn_pl_quantity'] = $packinglists[$x][$y]['pl_order_quantity_cut'];
                        $plrow[$key]['ctn_brand'] = $packinglists[$x][$y]['pl_brand'];
                        $plrow[$key]['ctn_type'] = $packinglists[$x][$y]['pl_type'];
                        $plrow[$key]['ctn_buy_year'] = $packinglists[$x][$y]['pl_buy_year'];
                        $plrow[$key]['ctn_buy_month'] = $packinglists[$x][$y]['pl_buy_month'];


                        $ctn_info = Carton::where([
                            ['ctn_size',$packinglists[$x][$y]['carton_size']],
                            ['type',$packinglists[$x][$y]['pl_type']],
                            ['brand_id',Brand::where('brand_name',$packinglists[$x][$y]['pl_brand'])->first()->id],
                        ])->first();

                        if($ctn_info !== null){
                            $plrow[$key]['ctn_specification'] = $ctn_info->ctn_specification;
                            $plrow[$key]['ctn_fob'] = ($ctn_info->ctn_fob);
                            $plrow[$key]['ctn_fob_all'] = ($ctn_info->ctn_fob * $plrow[$key]['ctn_quantity']);
                            $plrow[$key]['ctn_code'] = $ctn_info->ctn_code_1001 . $ctn_info->ctn_code_1004;
                        }else{
                            $plrow[$key]['ctn_specification'] = "";
                            $plrow[$key]['ctn_fob'] = 0;
                            $plrow[$key]['ctn_code'] = "";
                            $plrow[$key]['ctn_fob_all'] = 0;
                        }



                        if($packinglists[$x][$y]['net_weight_one_ctn'] == 0 || $packinglists[$x][$y]['net_weight_one_ctn'] == null){
                            $plrow[$key]['ctn_nw'] = "";
                            $plrow[$key]['ctn_gw'] = "";
                        }else{
                            $plrow[$key]['ctn_nw'] = $packinglists[$x][$y]['net_weight_one_ctn'];
                            $plrow[$key]['ctn_gw'] = $packinglists[$x][$y]['gross_weight_one_ctn'];
                        }
//

                        $size_style_carton_id =
                            round($packinglists[$x][$y]['pl_style_size_id']) . $packinglists[$x][$y]['pl_style_id']
                            . $packinglists[$x][$y]['carton_size_id'];

                        $mcq = DB::table('sizeables')->where('size_style_carton_id',$size_style_carton_id)->first();
                        if(!isset($mcq->mcq)){
//                            dd($size_style_carton_id);
                            $mcq = '';
                        }else{
                            if($plrow[$key]['ctn_pl_quantity'] < $mcq->mcq){
                                $mcq = $plrow[$key]['ctn_pl_quantity'];
                            }else{
                               $mcq = $mcq->mcq;
                            }
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
//            dd($bases);
        }

//        dd($plrow);
        return $plrow;
    }
}
