<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FabricColor;
use Illuminate\Http\Request;
use Validator;
class FabricColorApiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(FabricColor::create($this->rawData()),200);

    }

    public function destroy($fabric_color)
    {



        if($fabric_color == 'null'){
            return response()->json(['message' => 'Record not found!'], 404);
        }else{

            $fabric_color = explode(',' ,$fabric_color);

            if(count($fabric_color) == 1){
                FabricColor::where('id',$fabric_color[0])->delete();
                return response()->json(['success' => $fabric_color],200);
            }else{
                for($i=0;$i < count($fabric_color); $i++){
                    $fabric_color_record[$i] = FabricColor::where('id',$fabric_color[$i])->delete();
                }
                return response()->json(['success' => $fabric_color],200);
            }



        }


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
