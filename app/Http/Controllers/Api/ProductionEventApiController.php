<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductionEvent;
use Illuminate\Http\Request;
use Validator;

class ProductionEventApiController extends Controller
{

    public function index()
    {
        return response()->json(ProductionEvent::all(),200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $prod_event = ProductionEvent::create($this->rawData());

        return response()->json($prod_event,200);
    }

    public function show(ProductionEvent $production_event)
    {

        return response()->json($production_event,200);
    }

    public function update(ProductionEvent $production_event)
    {
        if(is_null($production_event)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $production_event->update($this->rawData())], 201);

    }


    public function destroy(ProductionEvent $production_event)
    {
        return response()->json(['success' => $production_event->delete(),201]);
    }

    protected function rawData(){
        return [
            'event' => ucfirst(request('event')),
            'special_date' => request('special_date'),
            'work_hour' => request('work_hour'),
            'bldg' => request('bldg'),
        ];
    }

    protected function dataValidated(){
        return [
            'event' => 'required',
            'special_date' => 'required',
            'work_hour' => 'required',
            'bldg' => 'required|regex:/^[A-z0-9, ]+$/'
        ];
    }
}
