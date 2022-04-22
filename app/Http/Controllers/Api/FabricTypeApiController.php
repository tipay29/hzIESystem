<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FabricType;
use Illuminate\Http\Request;
use Validator;
class FabricTypeApiController extends Controller
{

    public function index(){

        return response()->json(FabricType::all(),200);

    }


    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(FabricType::create($this->rawData()),200);

    }


    public function show(FabricType $fabric_type)
    {
        return response()->json($fabric_type,200);
    }


    public function update(FabricType $fabric_type)
    {

        if(is_null($fabric_type)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $fabric_type->update($this->rawData())],201);

    }

    public function destroy(FabricType $fabric_type)
    {

        return response()->json(['success' => $fabric_type->delete(),201]);

    }

    protected function rawData(){
        return [
            'fabric_type' => request('fabric_type'),
            'sas' => request('sas'),
            'sas_cut' => request('sas_cut'),
        ];
    }

    protected function dataValidated(){
        return [
            'fabric_type' => 'required',
            'sas' => 'required',
            'sas_cut' => 'required',
        ];
    }
}
