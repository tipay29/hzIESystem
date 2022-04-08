<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FabricCode;
use Illuminate\Http\Request;
use Validator;
class FabricCodeApiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(FabricCode::create($this->rawData()),200);

    }

    public function destroy($fabric_code)
    {

        if($fabric_code == 'null'){
            return response()->json(['message' => 'Record not found!'], 404);
        }else{

            $fabric_code = explode(',' ,$fabric_code);

            if(count($fabric_code) == 1){
                FabricCode::where('id',$fabric_code[0])->delete();
                return response()->json(['success' => $fabric_code],200);
            }else{
                for($i=0; $i < count($fabric_code); $i++){
                    $fabric_color_record[$i] = FabricCode::where('id',$fabric_code[$i])->delete();
                }
                return response()->json(['success' => $fabric_code],200);
            }



        }


    }

    protected function rawData(){
        return [
            'fabric_code' => request('fabric_code'),
        ];
    }

    protected function dataValidated(){
        return [
            'fabric_code' => 'required',
        ];
    }
}
