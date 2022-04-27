<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cut;
use Illuminate\Http\Request;

class CutApiController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Cut $cut)
    {
        $cut->load(['purchase_orders','fabric_codes','fabric_colors','fabric_types','placements']);

        return response()->json($cut,200);
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
