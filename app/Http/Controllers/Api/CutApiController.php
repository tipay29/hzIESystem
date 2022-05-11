<?php

namespace App\Http\Controllers\Api;

use App\Events\GetCutEffEvent;
use App\Events\GetTotalCutUtilEvent;
use App\Http\Controllers\Controller;
use App\Models\Cut;
use Illuminate\Http\Request;
use Validator;
class CutApiController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Cut $cut)
    {
        $cut->load(['styles','purchase_orders','fabric_codes','fabric_colors','fabric_types','placements']);

        return response()->json($cut,200);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function util(){

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $spread_start = new \DateTime(request('spread_start'));
        $spread_start->format('Y-m-d H:i:s');
        $spread_end = new \DateTime(request('spread_end'));
        $spread_end->format('Y-m-d H:i:s');

        $cuts = Cut::with([
            'styles','purchase_orders','fabric_codes',
            'fabric_colors','fabric_types','placements',
            'employees',
        ])
        ->whereBetween('spread_start',[$spread_start,$spread_end])
            ->get();

        $datas = event(new GetCutEffEvent($cuts,$spread_start,$spread_end));

        return response()->json($datas,200);
    }

    public function totalutil(){
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $spread_start = new \DateTime(request('spread_start'));
        $spread_start->format('Y-m-d H:i:s');
        $spread_end = new \DateTime(request('spread_end'));
        $spread_end->format('Y-m-d H:i:s');

        $cuts = Cut::with([
            'styles','purchase_orders','fabric_codes',
            'fabric_colors','fabric_types','placements',
            'employees',
        ])
            ->whereBetween('spread_start',[$spread_start,$spread_end])
            ->get();

        $datas = event(new GetTotalCutUtilEvent($cuts,request('spread_start'),request('spread_end')));

        return response()->json($datas,200);

    }

    protected function dataValidated(){
        return [
            'spread_start' => 'required|before:spread_end|before:now',
            'spread_end' => 'required|after:spread_start|before:now',
        ];
    }
}
