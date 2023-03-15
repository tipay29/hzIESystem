<?php

namespace App\Http\Controllers\Web;

use App\Events\PackingList\GetPackingListDataAllEvent;
use App\Events\PackingList\GetPackingListDataOneEvent;
use App\Exports\PackingListBatchExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\PackingListsImport;
use App\Models\PackingList;
use Illuminate\Pipeline\Pipeline;
use Maatwebsite\Excel\Facades\Excel;

class PackingListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $packinglists = app(Pipeline::class)
            ->send(
                PackingList::query()
            )
            ->through([
                \App\QueryFilters\Packing\Index\PO::class,
                \App\QueryFilters\Packing\Index\MasterPO::class,
                \App\QueryFilters\Packing\Index\FactoryPO::class,
                \App\QueryFilters\Packing\Index\Material::class,
                \App\QueryFilters\Packing\Index\Status::class,
                \App\QueryFilters\Packing\Index\User::class,
                \App\QueryFilters\Packing\Index\CustomerName::class,
                \App\QueryFilters\Packing\Index\CRD::class,
                \App\QueryFilters\Packing\Index\CreateDate::class,
            ])
            ->thenReturn()
            ->orderBy('id', 'DESC')
            ->with([
                'user',
            ])
            ->get();

        $packinglists = collect($packinglists->where('pl_uniq_number_batch',1))->paginate(10);

        return view('packing-list.index', compact('packinglists'));
    }

    public function mark(){


        $pathname = 'public/images/shipmark/' . request()->brand . '/' . request()->type . '/'  ;
        $filename = request()->country . '.png';
        $file = request()->file('file')->storeAs($pathname, $filename);

        return redirect()->back();
    }

    public function batch($batch){

        $packinglistsdummy = collect();
        $packinglistsqty = collect();

        $packinglistsNew = app(Pipeline::class)
            ->send(
                PackingList::query()
            )
            ->through([
                \App\QueryFilters\Packing\Batch\PO::class,
                \App\QueryFilters\Packing\Batch\MasterPO::class,
                \App\QueryFilters\Packing\Batch\FactoryPO::class,
                \App\QueryFilters\Packing\Batch\Material::class,
                \App\QueryFilters\Packing\Batch\Status::class,
                \App\QueryFilters\Packing\Batch\User::class,
                \App\QueryFilters\Packing\Batch\CustomerName::class,
                \App\QueryFilters\Packing\Batch\CRD::class,
                \App\QueryFilters\Packing\Batch\CreateDate::class,
                \App\QueryFilters\Packing\Batch\SortPO::class,
                \App\QueryFilters\Packing\Batch\SortMasterPO::class,
                \App\QueryFilters\Packing\Batch\SortFactoryPO::class,
                \App\QueryFilters\Packing\Batch\SortMaterial::class,
                \App\QueryFilters\Packing\Batch\SortCustomerName::class,
                \App\QueryFilters\Packing\Batch\SortCRD::class,
            ])
            ->thenReturn()
            ->where([['pl_batch',$batch],
                ['pl_uniq_number_batch_number',1]])
            ->get();

        for($x=1; $x <= count($packinglistsNew);$x++){
            $packinglistsdummy->add(PackingList::with('user')->where(
                [
                    ['pl_batch', $batch],
                    ['pl_number_batch', $x],
                ]
            )
                ->get());

            $packinglistsqty->add($packinglistsdummy[$x-1]->sum('pl_order_quantity'));
        }
        $pl_total_qty = $packinglistsqty->sum();

        $packinglists = $packinglistsNew;

        if(count($packinglists) ==0){
            return redirect(route('packing-lists.batch', $batch))->with('message', 'Invalid Search!!!');
        }

//        $packinglists = $packinglists->sortBy('pl_po_cut');

        return view('packing-list.batch', compact('packinglists','packinglistsqty','pl_total_qty'));

    }

    public function number($batch,$number){

        $packinglists = event(new GetPackingListDataOneEvent($batch,$number))[0];

        $last_pl = $packinglists[count($packinglists)-1];

        $cartons = $packinglists->unique('carton_size')->pluck('carton_size');
        unset($cartons[count($cartons)-1]);

        $pocollect = array();
        if(request()->has('pln_po_cut')){

            for($pln = 0; $pln < count(request('pln_po_cut')); $pln++){
                array_push($pocollect,array_reverse($packinglists->where('pl_po_cut',request('pln_po_cut')[$pln])->toArray()));
                if($pln !== 0){
                    $pocollect = array_merge($pocollect[$pln],$pocollect[$pln-1]);
                }
            }
            if(count(request()->pln_po_cut) == 1){
            $packinglists = collect(array_reverse($pocollect[0]));
            }else{
                $packinglists = collect(array_reverse($pocollect));
            }
            $packinglists->add($last_pl);
        }

        $masterpocollect = array();
        if(request()->has('pln_master_po')){

            for($pln = 0; $pln < count(request('pln_master_po')); $pln++){
                array_push($masterpocollect,array_reverse($packinglists->where('pl_master_po',request('pln_master_po')[$pln])->toArray()));
                if($pln !== 0){
                    $masterpocollect = array_merge($masterpocollect[$pln],$masterpocollect[$pln-1]);
                }
            }

            if(count(request()->pln_master_po) == 1){
                $packinglists = collect(array_reverse($masterpocollect[0]));
            }else{
                $packinglists = collect(array_reverse($masterpocollect));
            }
            $packinglists->add($last_pl);
        }

        $materialcollect = array();
        if(request()->has('pln_material')){

            for($pln = 0; $pln < count(request('pln_material')); $pln++){
                array_push($materialcollect,array_reverse($packinglists->where('pl_material',request('pln_material')[$pln])->toArray()));
                if($pln !== 0){
                    $materialcollect = array_merge($materialcollect[$pln],$materialcollect[$pln-1]);
                }
            }

            if(count(request()->pln_material) == 1){
                $packinglists = collect(array_reverse($materialcollect[0]));
            }else{
                $packinglists = collect(array_reverse($materialcollect));
            }
            $packinglists->add($last_pl);
        }

        $descriptioncollect = array();
        if(request()->has('pln_description')){

            for($pln = 0; $pln < count(request('pln_description')); $pln++){
                array_push($descriptioncollect,array_reverse($packinglists->where('pl_description',request('pln_description')[$pln])->toArray()));
                if($pln !== 0){
                    $descriptioncollect = array_merge($descriptioncollect[$pln],$descriptioncollect[$pln-1]);
                }
            }

            if(count(request()->pln_description) == 1){
                $packinglists = collect(array_reverse($descriptioncollect[0]));
            }else{
                $packinglists = collect(array_reverse($descriptioncollect));
            }
            $packinglists->add($last_pl);
        }

        $colorcollect = array();
        if(request()->has('pln_color')){

            for($pln = 0; $pln < count(request('pln_color')); $pln++){
                array_push($colorcollect,array_reverse($packinglists->where('pl_color',request('pln_color')[$pln])->toArray()));
                if($pln !== 0){
                    $colorcollect = array_merge($colorcollect[$pln],$colorcollect[$pln-1]);
                }
            }

            if(count(request()->pln_color) == 1){
                $packinglists = collect(array_reverse($colorcollect[0]));
            }else{
                $packinglists = collect(array_reverse($colorcollect));
            }
            $packinglists->add($last_pl);
        }
//        dd($packinglists);
        $cartoncollect = array();
        if(request()->has('pln_carton')){

            for($pln = 0; $pln < count(request('pln_carton')); $pln++){
                array_push($cartoncollect,array_reverse($packinglists->where('carton_size',request('pln_carton')[$pln])->toArray()));
                if($pln !== 0){
                    $cartoncollect = array_merge($cartoncollect[$pln],$cartoncollect[$pln-1]);
                }
            }

            if(count(request()->pln_carton) == 1){
                $packinglists = collect(array_reverse($cartoncollect[0]));
            }else{
                $packinglists = collect(array_reverse($cartoncollect));
            }
            $packinglists->add($last_pl);
        }

//        dd($packinglists);


        return view('packing-list.number', compact('packinglists','cartons'));

    }

    public function viewa($batch){

        $packinglists = event(new GetPackingListDataAllEvent($batch))[0];

//        dd($packinglists);

        return view('packing-list.viewa',compact('packinglists'));
    }

    public function create()
    {

        $packinglist = new PackingList();

        return view('packing-list.create', compact('packinglist'));

    }

    public function destroyBatch($batch)
    {
        $batches = PackingList::where('pl_batch',$batch)->pluck('id');
        PackingList::destroy($batches);
        return redirect()->back();
    }

    public function destroyNumber($batch,$number)
    {

        $numbers = PackingList::where([['pl_batch',$batch],
                                ['pl_number_batch',$number]])->pluck('id');
        $countPlNumbers = PackingList::where([['pl_batch',$batch]])->max('pl_number_batch');
        $countPlUniqNumbers = PackingList::where([['pl_batch',$batch]])->max('pl_uniq_number_batch');
        PackingList::destroy($numbers);

        $ctrl = 0;
        for($x=1; $x < ($countPlNumbers+1);$x++){

            $batches = PackingList::where([
                    ['pl_batch',$batch],
                    ['pl_number_batch',$x]
                ])->pluck('id');

            if($ctrl !== 0){
                PackingList::where([
                    ['pl_batch',$batch],
                    ['pl_number_batch',$x]
                ])->update(array('pl_number_batch' => $ctrl));
                $ctrl++;
            }

            if(count($batches) == 0){
                $ctrl = $x;
            }

        }

        $newBatch = PackingList::where('pl_batch',$batch)->get();
        $countNewBatch = count($newBatch);
        for($x=0;$x < $countNewBatch;$x++){
            $newBatch[$x]->update(['pl_uniq_number_batch' => $x+1]);
        }

        $pl_batch = PackingList::where('pl_batch',$batch)->get();

        if(count($pl_batch) == 0){
         return redirect(route('packing-lists.index'));
        }

        return redirect()->back();
    }

    public function export(){
        return Excel::download(new UsersExport,'users.xlsx');
    }

    public function exportBatches($batch){

        $excel =  Excel::download(new PackingListBatchExport($batch),'pl_batch.xlsx');

        return $excel;
    }

    public function import()
    {

        $brandntype = request()->brandntype;
//        $type = explode('-',$brandntype)[1];

        $file = request()->file('file');

        $import = new PackingListsImport($brandntype);
        $import->onlySheets('Worksheet');

        Excel::import($import, $file);

        return PackingList::max('pl_batch');

    }



}
