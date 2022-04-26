<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleApiController extends Controller
{

    public function index()
    {
        $styles = Style::all();

        return response()->json( $styles,200);
    }


    public function store(Request $request)
    {
        //
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
}
