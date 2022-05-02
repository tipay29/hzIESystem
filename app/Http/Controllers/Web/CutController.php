<?php

namespace App\Http\Controllers\Web;

use App\Events\GetCutEffEvent;
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
//        dd(request()->spread_start);

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

        $this->insertRelations($cut);



        return redirect(route('cuts.show', $cut->id));

    }

    public function show(Cut $cut)
    {
        $cut->load(['building','user','styles','purchase_orders',
                    'fabric_codes','fabric_colors','fabric_types',
                    'placements','employees.job']);

        return view('cut.show',compact('cut'));
    }

    public function edit(Cut $cut)
    {
        $cut->load(['building','user','styles','purchase_orders',
            'fabric_codes','fabric_colors','fabric_types',
            'placements','employees.job']);

        return view('cut.edit', compact('cut'));
    }

    public function update(Cut $cut)
    {
        $this->requestValidate();

        $cut->update([
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

        $this->insertRelations($cut);



        return redirect(route('cuts.show', $cut->id));
    }

    public function destroy(Cut $cut)
    {
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

        return view('cut.util');

    }

    public function totalUtil()
    {

        $cuts = Cut::with([
            'styles','purchase_orders','fabric_codes',
            'fabric_colors','fabric_types','placements',
            'employees',
        ])

//            ->whereBetween('spread_start',['2022-03-13 00:01:00','2022-03-19 23:23:58'])
            ->get();

        $datas = array(
            'building' => array(
                'B2' => array(

                ),
                'D4' => array(

                ),
                'E5' => array(

                ),
            ),
        );
        $ctr = 0;



        foreach($cuts as $cut){


                $date = $this->formatDate($cut->spread_start);

                if (array_key_exists($date, $datas['building'][$cut->building->building])){


                    if(array_key_exists($cut->table_num,$datas['building'][$cut->building->building][$date])){
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] =
                            $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] + ($cut->marker_length*$cut->layer_count);
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] =
                            $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] + $cut->work_hours;
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] =
                             $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] + 1;
                    }else{
                        $datas['building'][$cut->building->building][$date][$cut->table_num] = array();
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] = $cut->marker_length*$cut->layer_count;
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] = $cut->work_hours;
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] = 1;
                        $datas['building'][$cut->building->building][$date][$cut->table_num]['avg_work_hours'] = 0;
                    }


                }else{
                    $datas['building'][$cut->building->building][$date][$cut->table_num] = array();
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['actual_yards'] = $cut->marker_length*$cut->layer_count;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['work_hours'] = $cut->work_hours;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['count'] = 1;
                    $datas['building'][$cut->building->building][$date][$cut->table_num]['avg_work_hours'] = 0;


                }



        }



        dump($datas);

        return view('cut.total-util');

    }

    protected function formatDate($date){
        $date = new DateTime($date);
        return $date->format('Y-m-d');
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
            'spread_start' => 'required|before:spread_end|before:now',
            'spread_end' => 'required|after:spread_start|before:now',
            'cutter_id' => 'required',
            'cut_start' => 'required|before:cut_end|before:now',
            'cut_end' => 'required|after:cut_start|before:now',
        ]);
    }

    protected function insertRelations($cut){
        $cut->styles()->sync(request()->style);
        $cut->purchase_orders()->sync(request()->purchase_order);
        $cut->placements()->sync(request()->placement);
        $cut->fabric_colors()->sync(request()->fabric_color);
        $cut->fabric_codes()->sync(request()->fabric_code);
        $cut->fabric_types()->sync(request()->fabric_type);
        $cut->employees()->sync(array_merge(request()->spreader_id,request()->cutter_id));
    }


}
