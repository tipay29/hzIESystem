<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Validator;
class PurchaseOrderApiController extends Controller
{

    public function index()
    {
        return response()->json(PurchaseOrder::all(),200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(PurchaseOrder::create($this->rawData()),200);
    }


    public function show(PurchaseOrder $purchase_order)
    {
        return response()->json($purchase_order,200);
    }


    public function update(PurchaseOrder $purchase_order)
    {
        if(is_null($purchase_order)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $purchase_order->update($this->rawData())],201);
    }


    public function destroy(PurchaseOrder $purchase_order)
    {
        return response()->json(['success' => $purchase_order->delete(),201]);
    }

    protected function rawData(){
        return [
            'purchase_order' => strtoupper(request('purchase_order')),
        ];
    }

    protected function dataValidated(){
        return [
            'purchase_order' => 'required|unique:purchase_orders,purchase_order',
        ];
    }
}
