<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Http\Request;
use Validator;
class StyleApiController extends Controller
{

    public function attach(Style $style){

        $size = strtoupper(request()['size']);
        $weight = request()['weight'];
        $carton_id = request()['carton_id'];
        $mcq = request()['mcq'];


        if($mcq !== "" && $mcq !== null) {

            if (Size::where('size', $size)->doesntExist()) {
                $size = Size::create(['size' => $size]);
            } else {
                $size = Size::where('size', $size)->first();
            }

            $size_style_carton_id = $size->id . $style->id . $carton_id;

            if ($size->styles()->where('size_style_carton_id', $size_style_carton_id)->exists()) {

                $size->styles()->wherePivot('size_style_carton_id', '=', $size_style_carton_id)->detach();

                $size->styles()->attach([$style->id => [
                    'weight' => $weight,
                    'carton_id' => $carton_id,
                    'mcq' => $mcq,
                    'size_style_carton_id' => $size_style_carton_id,
                ]]);
                return response()->json($size->styles(), 200);
            }

            $size->styles()->attach([$style->id => [
                'weight' => $weight,
                'carton_id' => $carton_id,
                'mcq' => $mcq,
                'size_style_carton_id' => $size_style_carton_id,
            ]]);

        }

        return response()->json( ['success' => $style->pivot],200);
    }

    public function attachm(Style $style){

        $times = array('one','two','three','four','five','six','seven','eight','nine','ten');
        $places = array('first','second','third');
        //dump(request()->all());
        for($y = 0; $y <= 9;$y++){

            $size_size = strtoupper(request()['size_' . $times[$y]]);
            $weight = request()['weight_' . $times[$y]];

            for($x = 0; $x <= 2; $x++){

                $carton_id = request()['carton_id_' . $places[$x] . '_' . $times[$y]];
                $mcq = request()['mcq_'  . $places[$x] . '_' . $times[$y]];

                if($mcq !== null && $mcq !== ""){

                    if (Size::where('size', $size_size)->doesntExist()) {
                        $size = Size::create(['size' => $size_size]);
                    } else {
                        $size = Size::where('size', $size_size)->first();
                    }

                    $size_style_carton_id = $size->id . $style->id . $carton_id;

                    if ($size->styles()->where('size_style_carton_id', $size_style_carton_id)->exists()) {

                        $size->styles()->wherePivot('size_style_carton_id', '=', $size_style_carton_id)->detach();

                        $size->styles()->attach([$style->id => [
                            'weight' => $weight,
                            'carton_id' => $carton_id,
                            'mcq' => $mcq,
                            'size_style_carton_id' => $size_style_carton_id,
                        ]]);

                    }
                    $size->styles()->attach([$style->id => [
                        'weight' => $weight,
                        'carton_id' => $carton_id,
                        'mcq' => $mcq,
                        'size_style_carton_id' => $size_style_carton_id,
                    ]]);

                }



            }


        }

        return response()->json( ['success' => $style->pivot],200);
    }

    public function index()
    {
        $styles = Style::all();

        return response()->json( $styles,200);
    }


    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(),$this->dataValidated());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $style_code = strtoupper(request()->style_code);

        if ($style = Style::where('style_code', $style_code)->first()) {
            return response()->json( $style,200);
        }else {
            $style = Style::create([
                'style_code' => $style_code,
            ]);
            return response()->json( $style,200);
        }



    }


    public function show(Style $style)
    {

        $style->load(['purchase_orders','fabric_codes','fabric_colors','fabric_types','placements']);

        return response()->json($style,200);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    protected function rawData(){
        return [
            'style_code' => strtoupper(request('style_code')),
        ];
    }

    protected function dataValidated(){
        return [
            'style_code' => 'required|alpha_num',
        ];
    }
}
