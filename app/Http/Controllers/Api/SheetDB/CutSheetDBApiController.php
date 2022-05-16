<?php

namespace App\Http\Controllers\Api\SheetDB;

use App\Events\GetTotalCutUtilEvent;
use App\Events\PushCutEffSheetEvent;
use App\Http\Controllers\Controller;
use App\Models\Cut;
use Illuminate\Http\Request;
use SheetDB\SheetDB;

class CutSheetDBApiController extends Controller
{


    public function index()
    {

    }


    public function store(Request $request)
    {


        $spread_start = new \DateTime(request('spread_start'));
        $spread_start->format('Y-m-d H:i:s');
        $spread_end = new \DateTime(request('spread_end'));
        $spread_end->format('Y-m-d H:i:s');

        $cuts = Cut::with([
            'styles','purchase_orders','fabric_codes',
            'fabric_colors','fabric_types','placements',
            'employees',
        ])
            ->whereBetween('spread_start',[$spread_start,$spread_end])
            ->get();

        $datas = event(new GetTotalCutUtilEvent($cuts,$spread_start,$spread_end));

        event(new PushCutEffSheetEvent($datas));



        return response()->json(['Message' =>'Success!'],201);
    }


    public function show($id)
    {
        //
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
