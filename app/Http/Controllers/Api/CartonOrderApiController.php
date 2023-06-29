<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Carton;
use App\Models\CartonOrder;
use App\Models\CartonOrderContent;
use Illuminate\Http\Request;

class CartonOrderApiController extends Controller
{

    public function storeCartonOrder(){
        $ctn_bill_code = preg_replace('/\s\s+/', '',request()['ctn_bill_code']);
//        dd(request('ctn_content'));
//        dd(request()->all());
        $brand_id = Brand::where('brand_name',collect(request('ctn_content'))->first()['ctn_brand'])->first()->id;

        $carton_order = CartonOrder::create([
            'ctn_bill_code' => $ctn_bill_code,
            'ctn_order_date' => request()['ctn_order_date'],
            'ctn_delivery_Date' => request()['ctn_delivery_date'],
            'ctn_instruction' => request()['ctn_instruction'],
            'ctn_buy_month' => collect(request('ctn_content'))->first()['ctn_buy_month'],
            'ctn_buy_year' => collect(request('ctn_content'))->first()['ctn_buy_year'],
            'ctn_remarks' => request()['ctn_remarks'],
            'brand_id' => $brand_id,
            'ctn_type' => collect(request('ctn_content'))->first()['ctn_type'],
            'supplier_id' => request()['ctn_supplier_id'],
            'user_id' => request()['ctn_user_id'],
        ]);
//        dd(request('ctn_content'));
        foreach(request('ctn_content') as $key => $ctn_content){

            $carton = Carton::where([
                ['brand_id',Brand::where('brand_name',$ctn_content['ctn_brand'])->first()->id],
                ['type',$ctn_content['ctn_type']],
                ['ctn_size',$ctn_content['ctn_carton']],
            ])->first();

            if($carton === null){
                return response()->json(['message' => 'Check carton!!!'],200);
            }

           $carton_id = $carton->id;


            $carton_order->carton_order_contents()->create([
                'carton_id' => $carton_id,
                'ctn_factory_po' => $ctn_content['ctn_factory_po'],
                'ctn_dc_code' => $ctn_content['ctn_dc_code'],
                'ctn_customer_name' => $ctn_content['ctn_customer_name'],
                'ctn_destination' => $ctn_content['ctn_destination'],
                'ctn_master_po' => $ctn_content['ctn_master_po'],
                'ctn_material' => $ctn_content['ctn_material'],
                'ctn_description' => $ctn_content['ctn_desc'],
                'ctn_style_size' => $ctn_content['ctn_style_size'],
                'ctn_po_quantity' => $ctn_content['ctn_pl_quantity'],
                'ctn_quantity_per_carton' => $ctn_content['ctn_mcq'],
                'ctn_quantity' => $ctn_content['ctn_quantity'],
                'ctn_nw_one' => $ctn_content['ctn_nw'],
                'ctn_gw_one' => $ctn_content['ctn_gw'],
            ]);

        }

        return response()->json($carton_order,200);
    }

    public function updateCartonQuantity(){

//        dd(count(request('ctn_ids')));

        for($x=0;$x < count(request('ctn_ids'));$x++){
           $ctn_order =  CartonOrderContent::where('id',request('ctn_ids')[$x]);
           $ctn_order->update(['ctn_quantity' => request('ctn_quantity')]);
        }

        return response()->json(['message' => 'success'],200);
    }

    public function updateCartonCode(){

        for($x=0;$x < count(request('ctn_ids'));$x++){
            $ctn_order =  CartonOrderContent::where('id',request('ctn_ids')[$x]);
            $ctn_order->update(['ctn_code' => request('ctn_code')]);
        }

        return response()->json(['message' => 'success'],200);
    }

    public function updateCartonCollection(){

        for($x=0;$x < count(request('ctn_ids'));$x++){
            $ctn_order =  CartonOrderContent::where('id',request('ctn_ids')[$x]);
            $ctn_order->update(['ctn_collection' => request('ctn_collection')]);
        }

        return response()->json(['message' => 'success'],200);
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
