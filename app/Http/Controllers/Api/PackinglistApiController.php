<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PackingList;
use Illuminate\Http\Request;
use Validator;

class PackinglistApiController extends Controller
{

    protected $pl_number_batch;
    protected $ctrl_number_batch;

    public function index(){

        $packinglists = PackingList::all();

        if(is_null($packinglists)){

            return response()->json(['Message' => 'No record!'],404);
        }

        return response()->json($packinglists,200);
    }

    public function store(){
        $validator = Validator::make(request()->all(),$this->dataValidatedStore());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(PackingList::create($this->rawDataStore()),200);
    }

    public function updateqty(PackingList $packinglist)
    {
//        return response()->json(request()->all(),200);

        if(is_null($packinglist)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),$this->dataValidatedQTY());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        return response()->json(['success' => $packinglist->update($this->rawDataQTY())],201);

    }

    public function updatenw(PackingList $packinglist)
    {
//        return response()->json(request()->all(),200);

        if(is_null($packinglist)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),[
            'id' => 'required',
            'nw' => 'required',
            'row_cut' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        if(request()->row_cut == 1){
                    return response()->json(['success' => $packinglist->update([
            'pl_nw_one' => request('nw'),
                ])],201);
        }else{
            return response()->json(['success' => $packinglist->update([
                'pl_nw_two' => request('nw'),
            ])],201);
        }

    }

    public function updategw(PackingList $packinglist)
    {
//        return response()->json(request()->all(),200);

        if(is_null($packinglist)){
            return response()->json(['Message' =>'No input!'],404);
        }

        $validator = Validator::make(request()->all(),[
            'id' => 'required',
            'gw' => 'required',
            'row_cut' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        if(request()->row_cut == 1){
            return response()->json(['success' => $packinglist->update([
                'pl_gw_one' => request('gw'),
            ])],201);
        }else{
            return response()->json(['success' => $packinglist->update([
                'pl_gw_two' => request('gw'),
            ])],201);
        }

    }

    public function destroy(PackingList $packinglist)
    {

        if(is_null($packinglist)){
            return response()->json(['Message' =>'Record not found!'],404);
        }

        return response()->json(['success' => $packinglist->delete()],200);
    }

    public function remarks(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_remarks'=> request()->remarks]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function versions(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_version'=> request()->version]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function versionsone(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_version'=> request()->version]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function remarkstwo(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_remarks_two'=> request()->remarks_two]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function destinations(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_destination'=> request()->destination]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function crds(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

//        dd($packinglists);
        if($packinglists[0]['pl_type'] === "EQUIPMENT"){
            $pl_number_batch = PackingList::where([
                ['pl_batch', $packinglists[0]->pl_batch],
                ['pl_crd', request()->crd],
                ['pl_country',$packinglists[0]->pl_country],
                ['pl_pre_pack',$packinglists[0]->pl_pre_pack],
                ['pl_shipment_mode',$packinglists[0]->pl_shipment_mode],
            ])->first();



            if($pl_number_batch !== null){

                $this->pl_number_batch = $pl_number_batch->pl_number_batch;

                $packinglists->each(function ($item){
                    $update_details = array(
                        'pl_crd'=> request()->crd,
                        'pl_number_batch' => $this->pl_number_batch,
                        'pl_uniq_number_batch_number' => 2,
                        'pl_uniq_number_batch' => 2
                    );
                    $item->update($update_details);
                });

                $this->alineNumberBatch();
            }else{

                $packinglists->each(function ($item){
                    $item->update(['pl_crd'=> request()->crd]);
                });
            }

        }else{
            $packinglists->each(function ($item){
                $item->update(['pl_crd'=> request()->crd]);
            });
        }


        return response()->json(['success' => $packinglists],201);

    }

    public function countries(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        if($packinglists[0]['pl_type'] === "EQUIPMENT"){
            $pl_number_batch = PackingList::where([
                ['pl_batch', $packinglists[0]->pl_batch],
                ['pl_crd', $packinglists[0]->pl_crd],
                ['pl_country',request()->country],
                ['pl_country_two',request()->country_two],
                ['pl_pre_pack',$packinglists[0]->pl_pre_pack],
                ['pl_shipment_mode',$packinglists[0]->pl_shipment_mode],
            ])->first();
//            dd($pl_number_batch);
            if($pl_number_batch !== null){

                $this->pl_number_batch = $pl_number_batch->pl_number_batch;

                $packinglists->each(function ($item){
                    $update_details = array(
                        'pl_country'=> request()->country,
                        'pl_country_two' => request()->country_two,
                        'pl_number_batch' => $this->pl_number_batch,
                        'pl_uniq_number_batch_number' => 2,
                        'pl_uniq_number_batch' => 2
                    );
                    $item->update($update_details);
                });


                $this->alineNumberBatch();

            }else{

                $packinglists->each(function ($item){
                    $update_details = array(
                        'pl_country'=> request()->country,
                        'pl_country_two' => request()->country_two,
                    );
                    $item->update($update_details);
                });
            }

        }else{
            $packinglists->each(function ($item){
                $update_details = array(
                    'pl_country'=> request()->country,
                    'pl_country_two' => request()->country_two,
                );
                $item->update($update_details);
            });
        }

        return response()->json(['success' => $packinglists],201);

    }

    public function prepacks(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_pre_pack'=> request()->prepacks]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function status(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_status'=> request()->status]);
        });

        return response()->json( $packinglists,201);

    }

    public function factorypos(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_factory_po'=> request()->factory_po]);
        });

        return response()->json( $packinglists,201);

    }

    public function shipments(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_shipment_mode'=> request()->shipment_mode]);
        });

        return response()->json( $packinglists,201);

    }

    public function specials(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_special_packs'=> request()->specials]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function customers(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request()->batch],
                ['pl_number_batch',  request()->number_batch],
            ]
        )->get();

        $packinglists->each(function ($item){

            $custdest = explode("-",request()->customer);

            $item->update([
                'pl_country' => $custdest[0],
                'pl_country_two' => $custdest[1],
                'pl_destination' => $custdest[2],
                ]);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function approves($batch){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  $batch],
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_status'=> 'Final']);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function approveNumber(){

        $packinglists = PackingList::where(
            [
                ['pl_batch',  request('batch')],
                ['pl_number_batch',request('number')]
            ]
        )->get();

        $packinglists->each(function ($item){
            $item->update(['pl_status'=> 'Final']);
        });

        return response()->json(['success' => $packinglists],201);

    }

    public function getPO($batch,$number){
        return PackingList::where([
            ['pl_batch',$batch],
            ['pl_number_batch',$number]
        ])
            ->select('pl_po_cut')
            ->distinct()
            ->get();
    }

    public function getMasterPO($batch,$number){
        return PackingList::where([
            ['pl_batch',$batch],
            ['pl_number_batch',$number]
        ])
            ->select('pl_master_po')
            ->distinct()
            ->get();
    }

    public function getMaterial($batch,$number){
        return PackingList::where([
            ['pl_batch',$batch],
            ['pl_number_batch',$number]
        ])
            ->select('pl_material')
            ->distinct()
            ->get();
    }

    public function getDescription($batch,$number){
        return PackingList::where([
            ['pl_batch',$batch],
            ['pl_number_batch',$number]
        ])
            ->select('pl_description')
            ->distinct()
            ->get();
    }
    public function getColor($batch,$number){
        return PackingList::where([
            ['pl_batch',$batch],
            ['pl_number_batch',$number]
        ])
            ->select('pl_color')
            ->distinct()
            ->get();
    }

    protected function dataValidatedQTY(){
        return [
            'id' => 'required',
            'quantity' => 'required',
        ];
    }

    protected function rawDataQTY(){
        return [
            'pl_order_quantity' => request('quantity'),
        ];
    }

    protected function dataValidatedStore(){
        return [
            'pl_po_cut' => 'required',
            'pl_master_po' => 'required',
            'pl_factory_po' => 'required',
            'pl_sku' => 'required',
            'pl_material' => 'required',
            'pl_description' => 'required',
            'pl_color' => 'required',
            'pl_style_size' => 'required',
            'pl_country' => 'required',
            'pl_crd' => 'required',
            'pl_order_quantity' => 'required',
            'pl_pre_pack' => 'required',
            'pl_brand' => 'required',
            'pl_type' => 'required',
            'pl_batch' => 'required',
            'pl_number_batch' => 'required',
            'user_id' => 'required',
        ];
    }

    protected function rawDataStore(){
        return [
            'pl_po_cut' => request('pl_po_cut'),
            'pl_master_po' => request('pl_master_po'),
            'pl_factory_po' => request('pl_factory_po'),
            'pl_sku' => request('pl_sku'),
            'pl_material' => request('pl_material'),
            'pl_description' => request('pl_description'),
            'pl_color' => request('pl_color'),
            'pl_style_size' => request('pl_style_size'),
            'pl_country' => request('pl_country'),
            'pl_crd' => request('pl_crd'),
            'pl_order_quantity' => request('pl_order_quantity'),
            'pl_pre_pack' => request('pl_pre_pack'),
            'pl_brand' => request('pl_brand'),
            'pl_type' => request('pl_type'),
            'pl_batch' => request('pl_batch'),
            'pl_number_batch' => request('pl_number_batch'),
            'user_id' => request('user_id'),
        ];
    }

    protected function alineNumberBatch(){
        $count_pl_max_number_batch = PackingList::where('pl_batch',request()->batch)->max('pl_number_batch');


        $this->ctrl_number_batch = array();

        for($x = 1; $x <= $count_pl_max_number_batch;$x++){
            $pl_aline_number_batch = PackingList::where([
                ['pl_batch',request()->batch],
                ['pl_number_batch', $x],
            ])->get();

            if(count($pl_aline_number_batch) !== 0){
                dump($this->ctrl_number_batch);
                if(count($this->ctrl_number_batch) !== 0){
                    $pl_aline_number_batch->each(function ($item){
                        $item->update(['pl_number_batch' => $this->ctrl_number_batch[0]]);
                    });
                    unset($this->ctrl_number_batch[0]);
                    $this->ctrl_number_batch = array_values($this->ctrl_number_batch);
                    array_push($this->ctrl_number_batch,$x);
                }

            }else{
                array_push($this->ctrl_number_batch,$x);
            }

        }
    }
}
