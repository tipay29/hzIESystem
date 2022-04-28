<?php

namespace App\Http\Controllers\Api;

use App\Events\GetCutEffEvent;
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

    public function util()
    {
        $cuts = Cut::with([
            'styles','purchase_orders','fabric_codes',
            'fabric_colors','fabric_types','placements',
            'employees',
        ])
            ->get();
//        ->whereIn('building_id', array(2,4,5))
//        ->whereBetween('spread_start',['2022-03-14 00:00:01','2022-03-15 23:59:59'])
//        ->whereBetween('spread_end',['2022-03-14 00:00:01','2022-03-15 23:59:59'])

        $datas = event(new GetCutEffEvent($cuts));

        return response()->json($datas,200);

    }
}
