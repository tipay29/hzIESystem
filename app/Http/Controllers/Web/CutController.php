<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cut;
use Illuminate\Http\Request;
use DateTime;
class CutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $cuts = Cut::with([
            'styles','purchase_orders','fabric_codes',
            'fabric_colors','fabric_types','placements',
            'employees',
        ])->get();

        return view('cut.index',compact('cuts'));
    }


    public function create()
    {
        $cut = new Cut();

        return view('cut.create', compact('cut'));
    }


    public function store()
    {

        $this->requestValidate();

        $cut = Cut::create([
            'building_id' => request()->building_id,
            'table_num' => request()->table_num,
            'marker_length' => request()->marker_length,
            'layer_count' => request()->layer_count,
            'part_count' => request()->part_count,
            'size_ratio' => request()->size_ratio,
            'cut_count' => request()->cut_count,
            'work_hours' => request()->work_hours,
            'spread_start' => request()->spread_start,
            'spread_end' => request()->spread_end,
            'cut_start' => request()->cut_start,
            'cut_end' => request()->cut_end,
            'user_id' => auth()->user()->id,
        ]);

        $cut->styles()->sync(request()->style);
        $cut->purchase_orders()->sync(request()->purchase_order);
        $cut->placements()->sync(request()->placement);
        $cut->fabric_colors()->sync(request()->fabric_color);
        $cut->fabric_codes()->sync(request()->fabric_code);
        $cut->fabric_types()->sync(request()->fabric_type);
        $cut->employees()->sync(array_merge(request()->spreader_id,request()->cutter_id));


        return redirect(route('cuts.index'));

    }

    public function show(Cut $cut)
    {

    }

    public function edit(Cut $cut)
    {

    }

    public function update(Request $request, Cut $cut)
    {

    }

    public function destroy(Cut $cut)
    {

    }


    protected function convertDateTime($date){

        return new DateTime(str_replace("T"," ",$date));
    }

    protected function requestValidate(){
        return request()->validate([
            'purchase_order' => 'required|array',
            'style' => 'required',
            'placement' => 'required|array',
            'fabric_color' => 'required|array',
            'fabric_code' => 'required|array',
            'fabric_type' => 'required|array',
            'table_num' => 'required',
            'marker_length' => 'required',
            'layer_count' => 'required',
            'part_count' => 'required',
            'size_ratio' => 'required',
            'cut_count' => 'required',
            'work_hours' => 'required',
            'spreader_id' => 'required',
            'spread_start' => 'required|before:spread_end',
            'spread_end' => 'required|after:spread_start',
            'cutter_id' => 'required',
            'cut_start' => 'required|before:cut_end',
            'cut_end' => 'required|after:cut_start',
        ]);
    }


}
