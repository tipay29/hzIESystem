<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Carton;
use App\Models\CartonOrder;
use Illuminate\Http\Request;

class CartonOrderApiController extends Controller
{

    public function storeCartonOrder(){
        $ctn_bill_code = preg_replace('/\s\s+/', '',request()['ctn_bill_code']);
//        dd(request('ctn_content'));


        $carton_order = CartonOrder::create([
            'ctn_bill_code' => $ctn_bill_code,
            'ctn_order_date' => request()['ctn_order_date'],
            'ctn_delivery_Date' => request()['ctn_delivery_date'],
            'ctn_instruction' => request()['ctn_instruction'],
            'ctn_remarks' => request()['ctn_remarks'],
            'supplier_id' => request()['ctn_supplier_id'],
            'user_id' => request()['ctn_user_id'],
        ]);

        foreach(request('ctn_content') as $key => $ctn_content){

            $carton = Carton::where([
                ['brand_id',Brand::where('brand_name',$ctn_content['ctn_brand'])->first()->id],
                ['type',$ctn_content['ctn_type']],
                ['ctn_size',$ctn_content['ctn_carton']],
            ])->first()->id;

            $carton_order->carton_order_contents()->create([
                'carton_id' => $carton,
                'ctn_factory_po' => $ctn_content['ctn_factory_po'],
                'ctn_dc_code' => $ctn_content['ctn_dc_code'],
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

        dd($carton_order->carton_order_contents);
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
