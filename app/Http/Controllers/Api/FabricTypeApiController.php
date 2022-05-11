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

        $ftypes = strtoupper(request()->fabric_type);
        $ftypesA=[];
        if (str_contains($ftypes, '/')) {
            $newFtypes = explode('/',$ftypes);

            for ($x = 0; $x < count($newFtypes); $x++) {

                if ($ftype = FabricType::where('fabric_type', $newFtypes[$x])->first()) {
                    $ftypesA[] = $ftype;
                }else{
                    $ftypesA[] = FabricType::create([
                        'fabric_type' => $newFtypes[$x],
                    ]);
                }
            }

            return response()->json($ftypesA,200);
        }

        if ($fabric_type = FabricType::where('fabric_type', $ftypes)->first()) {
            $ftypesA[] = $fabric_type;
        }else {
            $ftypesA[] = FabricType::create([
                'fabric_type' => $ftypes,
            ]);
        }
        return response()->json($ftypesA,200);

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

        $ftype = strtoupper(request()->fabric_type);

        if (FabricType::where('fabric_type', $ftype)->first()) {
            return response()->json(['Fabric Type' => 'Already exists!'],400);
        }else {
            return response()->json(['success' => $fabric_type->update($this->rawData())], 201);
        }
    }

    public function destroy(FabricType $fabric_type)
    {

        return response()->json(['success' => $fabric_type->delete(),201]);

    }

    protected function rawData(){
        return [
            'fabric_type' => strtoupper(request('fabric_type')),
            'sas' => request('sas'),
            'sas_cut' => request('sas_cut'),
        ];
    }

    protected function dataValidated(){
        return [
            'fabric_type' => 'required|regex:/^[A-z0-9\\/]+$/',
        ];
    }
}
