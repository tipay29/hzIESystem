<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;
use Validator;
class StyleApiController extends Controller
{

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
