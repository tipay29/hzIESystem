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


    public function store()
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $pos = request()->purchase_order;
        $posA=[];
        if (str_contains($pos, '/')) {
            $newPos = explode('/',$pos);

            for ($x = 0; $x < count($newPos); $x++) {

                if ($po = PurchaseOrder::where('purchase_order', $newPos[$x])->first()) {
                    $posA[] = $po;
                }else{
                    $posA[] = PurchaseOrder::create([
                        'purchase_order' => $newPos[$x],
                    ]);
                }
            }

            return response()->json($posA,200);
        }

        if ($po = PurchaseOrder::where('purchase_order', $pos)->first()) {
            $posA[] = $po;
        }else {
            $posA[] = PurchaseOrder::create([
                'purchase_order' => $pos,
            ]);
        }
        return response()->json($posA,200);

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

        $po = strtoupper(request()->purchase_order);

        if (PurchaseOrder::where('purchase_order', $po)->first()) {
            return response()->json(['Purchase Order' => 'Already exists!'],400);
        }else{
            return response()->json(['success' => $purchase_order->update($this->rawData())],201);
        }

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
            'purchase_order' => 'required|regex:/^[0-9\\/]+$/',
        ];
    }
}
