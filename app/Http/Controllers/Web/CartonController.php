<?php

namespace App\Http\Controllers\Web;

use App\Events\Carton\GetPLCartonOrderFormEvent;
use App\Http\Controllers\Controller;
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

        $packinglists = event(new GetPLCartonOrderFormEvent(request()->all()));

        $cartonorder = $this->getCartonForm($packinglists);

        $cartonorders = collect($cartonorder);
//        dd($cartonorders);
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
//                        array_push($bases,$key);
//                        dump($key);

                        $plrow[$key]['ctn_factory_po'] = $packinglists[$x][$y]['pl_factory_po'];
                        $plrow[$key]['ctn_master_po'] = $packinglists[$x][$y]['pl_master_po'];
                        $plrow[$key]['ctn_material'] = $packinglists[$x][$y]['pl_material'];
                        $plrow[$key]['ctn_desc'] = $packinglists[$x][$y]['pl_color'];
                        $plrow[$key]['ctn_dc_code'] = explode(' ',trim($packinglists[$x][$y]['pl_country']))[0];
                        $plrow[$key]['ctn_style_size'] = $packinglists[$x][$y]['pl_style_size'];
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

        return $plrow;
    }
}
