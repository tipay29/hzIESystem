<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FabricCode;
use Illuminate\Http\Request;
use Validator;
class FabricCodeApiController extends Controller
{

    public function index(){

        return response()->json(FabricCode::all(),200);

    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(FabricCode::create($this->rawData()),200);

    }

    public function show(FabricCode $fabric_code)
    {
        return response()->json($fabric_code,200);
    }

    public function update(FabricCode $fabric_code)
    {

        if(is_null($fabric_code)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $fabric_code->update($this->rawData())],201);

    }

    public function destroy(FabricCode $fabric_code)
    {

        return response()->json(['success' => $fabric_code->delete(),201]);

    }

    protected function rawData(){
        return [
            'fabric_code' => strtoupper(request('fabric_code')),
        ];
    }

    protected function dataValidated(){
        return [
            'fabric_code' => 'required|unique:fabric_codes,fabric_code',
        ];
    }


}
