<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FabricColor;
use Illuminate\Http\Request;
use Validator;
class FabricColorApiController extends Controller
{

    public function index(){

       return response()->json(FabricColor::all(),200);

    }



    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(FabricColor::create($this->rawData()),200);

    }

    public function show(FabricColor $fabric_color)
    {
        return response()->json($fabric_color,200);
    }

    public function update(FabricColor $fabric_color)
    {

        if(is_null($fabric_color)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $fabric_color->update([
            'fabric_color' => request('fabric_color'),
        ])],201);

    }

    public function destroy(FabricColor $fabric_color)
    {

        return response()->json(['success' => $fabric_color->delete(),201]);

    }

    protected function rawData(){
        return [
            'fabric_color' => request('fabric_color'),
        ];
    }

    protected function dataValidated(){
        return [
            'fabric_color' => 'required',
        ];
    }
}
