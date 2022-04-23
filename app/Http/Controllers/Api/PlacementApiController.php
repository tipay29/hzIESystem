<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use Illuminate\Http\Request;
use Validator;

class PlacementApiController extends Controller
{

    public function index(){

        return response()->json(Placement::all(),200);

    }


    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(Placement::create($this->rawData()),200);

    }


    public function show(Placement $placement)
    {
        return response()->json($placement,200);
    }


    public function update(Placement $placement)
    {

        if(is_null($placement)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $placement->update($this->rawData())],201);

    }

    public function destroy(Placement $placement)
    {

        return response()->json(['success' => $placement->delete(),201]);

    }

    protected function rawData(){
        return [
            'placement' => strtoupper(request('placement')),
        ];
    }

    protected function dataValidated(){
        return [
            'placement' => 'required|unique:placements,placement',
        ];
    }
}
