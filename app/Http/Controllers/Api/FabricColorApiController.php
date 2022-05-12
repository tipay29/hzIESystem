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

        $fcolors = strtoupper(request()->fabric_color);
        $fcolorsA=[];
        if (str_contains($fcolors, '/')) {
            $newFcolors = explode('/',$fcolors);

            for ($x = 0; $x < count($newFcolors); $x++) {

                if ($fcolor = FabricColor::where('fabric_color', $newFcolors[$x])->first()) {
                    $fcolorsA[] = $fcolor;
                }else{
                    $fcolorsA[] = FabricColor::create([
                        'fabric_color' => $newFcolors[$x],
                    ]);
                }
            }

            return response()->json($fcolorsA,200);
        }


        if ($fabric_color = FabricColor::where('fabric_color', $fcolors)->first()) {
            $fcolorsA[] = $fabric_color;
        }else {
            $fcolorsA[] = FabricColor::create([
                'fabric_color' => $fcolors,
            ]);
        }
        return response()->json($fcolorsA,200);

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

        $fcolor = strtoupper(request()->fabric_color);

        if (FabricColor::where('fabric_color', $fcolor)->first()) {
            return response()->json(['Fabric Color' => 'Already exists!'],400);
        }else {
            return response()->json(['success' => $fabric_color->update($this->rawData())], 201);
        }
    }

    public function destroy(FabricColor $fabric_color)
    {

        return response()->json(['success' => $fabric_color->delete(),201]);

    }

    protected function rawData(){
        return [
            'fabric_color' => strtoupper(request('fabric_color')),
        ];
    }

    protected function dataValidated(){
        return [
            'fabric_color' => 'required|regex:/^[A-z0-9\\/ ]+$/',
        ];
    }
}
