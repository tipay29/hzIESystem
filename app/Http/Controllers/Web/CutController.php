<?php

namespace App\Http\Controllers\Web;

use App\Events\GetCutEffEvent;
use App\Http\Controllers\Controller;
use App\Models\Cut;
use App\Models\Style;
use Illuminate\Http\Request;
use DateTime;
class CutController extends Controller
{

    public function __construct()
    {


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
        $this->authorize('create',Cut::class);

        $cut = new Cut();

        return view('cut.create', compact('cut'));
    }


    public function store()
    {

        $this->authorize('create',Cut::class);

        $this->requestValidate();
//        dd(request()->spread_start);

        $cut = Cut::create([
            'building_id' => request()->building_id,
            'table_num' => request()->table_num,
            'marker_length' => request()->marker_length,
            'layer_count' => request()->layer_count,
            'part_count' => request()->part_count,
            'size_ratio' => request()->size_ratio,
            'work_hours' => request()->work_hours,
            'spread_start' => request()->spread_start,
            'spread_end' => request()->spread_end,
            'cut_start' => request()->cut_start,
            'cut_end' => request()->cut_end,
            'user_id' => auth()->user()->id,
        ]);

        $this->insertRelations($cut);



        return redirect(route('cuts.show', $cut->id));

    }

    public function show(Cut $cut)
    {
        $this->authorize('view',$cut);

        $cut->load(['building','user','styles','purchase_orders',
                    'fabric_codes','fabric_colors','fabric_types',
                    'placements','employees.job']);

        return view('cut.show',compact('cut'));
    }

    public function edit(Cut $cut)
    {
        $this->authorize('update',$cut);

        $cut->load(['building','user','styles','purchase_orders',
            'fabric_codes','fabric_colors','fabric_types',
            'placements','employees.job']);

        return view('cut.edit', compact('cut'));
    }

    public function update(Cut $cut)
    {
        $this->authorize('update',$cut);

        $this->requestValidate();

        $cut->update([
            'building_id' => request()->building_id,
            'table_num' => request()->table_num,
            'marker_length' => request()->marker_length,
            'layer_count' => request()->layer_count,
            'part_count' => request()->part_count,
            'size_ratio' => request()->size_ratio,
            'work_hours' => request()->work_hours,
            'spread_start' => request()->spread_start,
            'spread_end' => request()->spread_end,
            'cut_start' => request()->cut_start,
            'cut_end' => request()->cut_end,
            'user_id' => auth()->user()->id,
        ]);

        $this->insertRelations($cut);



        return redirect(route('cuts.show', $cut->id));
    }

    public function destroy(Cut $cut)
    {
        $this->authorize('delete',$cut);

        $cut->styles()->detach();
        $cut->purchase_orders()->detach();
        $cut->fabric_colors()->detach();
        $cut->fabric_codes()->detach();
        $cut->fabric_types()->detach();
        $cut->placements()->detach();
        $cut->employees()->detach();
        $cut->delete();

        return redirect(route('cuts.index'));

    }

    public function util()
    {

        $this->authorize('viewUtil',Cut::class);

        return view('cut.util');

    }

    public function totalUtil()
    {

        $this->authorize('viewTotalUtil',Cut::class);

        return view('cut.total-util');

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
            'work_hours' => 'required',
            'spreader_id' => 'required',
            'spread_start' => 'required|before:spread_end',
            'spread_end' => 'required|after:spread_start',
            'cutter_id' => 'required',
            'cut_start' => 'required|before:cut_end',
            'cut_end' => 'required|after:cut_start',
        ]);
    }

    protected function insertRelations($cut){
        $style = Style::where('id',request()->style)->first();

        $style->purchase_orders()->sync(request()->purchase_order);
        $style->placements()->sync(request()->placement);
        $style->fabric_colors()->sync(request()->fabric_color);
        $style->fabric_codes()->sync(request()->fabric_code);
        $style->fabric_types()->sync(request()->fabric_type);

        $cut->styles()->sync(request()->style);
        $cut->purchase_orders()->sync(request()->purchase_order);
        $cut->placements()->sync(request()->placement);
        $cut->fabric_colors()->sync(request()->fabric_color);
        $cut->fabric_codes()->sync(request()->fabric_code);
        $cut->fabric_types()->sync(request()->fabric_type);
        $cut->employees()->sync(array_merge(request()->spreader_id,request()->cutter_id));
    }


}
