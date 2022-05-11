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

        $fcodes = strtoupper(request()->fabric_code);
        $fcodesA=[];
        if (str_contains($fcodes, '/')) {
            $newFcodes = explode('/',$fcodes);

            for ($x = 0; $x < count($newFcodes); $x++) {

                if ($fcode = FabricCode::where('fabric_code', $newFcodes[$x])->first()) {
                    $fcodesA[] = $fcode;
                }else{
                    $fcodesA[] = FabricCode::create([
                        'fabric_code' => $newFcodes[$x],
                    ]);
                }
            }

            return response()->json($fcodesA,200);
        }

        if ($fabric_code = FabricCode::where('fabric_code', $fcodes)->first()) {
            $fcodesA[] = $fabric_code;
        }else {
            $fcodesA[] = FabricCode::create([
                'fabric_code' => $fcodes,
            ]);
        }
        return response()->json($fcodesA,200);

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

        $fcode = strtoupper(request()->fabric_code);

        if (FabricCode::where('fabric_code', $fcode)->first()) {
            return response()->json(['Fabric Code' => 'Already exists!'],400);
        }else {
            return response()->json(['success' => $fabric_code->update($this->rawData())], 201);
        }
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
            'fabric_code' => 'required|regex:/^[A-z0-9\\/]+$/',
        ];
    }


}
