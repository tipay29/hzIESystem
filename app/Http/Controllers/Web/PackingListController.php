<?php

namespace App\Http\Controllers\Web;

use App\Events\PackingList\GetPackingListDataAllEvent;
use App\Events\PackingList\GetPackingListDataOneEvent;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\PackingListsImport;
use App\Imports\UsersImport;
use App\Models\PackingList;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\isEmpty;
use function Symfony\Component\Finder\reverseSorting;
use function Symfony\Component\Routing\Loader\Configurator\collection;
use function Symfony\Component\String\reverse;

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
                \App\QueryFilters\Packing\PO::class,
                \App\QueryFilters\Packing\MasterPO::class,
                \App\QueryFilters\Packing\FactoryPO::class,
                \App\QueryFilters\Packing\Material::class,
                \App\QueryFilters\Packing\Color::class,
                \App\QueryFilters\Packing\Status::class,
                \App\QueryFilters\Packing\User::class,
                \App\QueryFilters\Packing\CustomerName::class,
                \App\QueryFilters\Packing\CRD::class,
                \App\QueryFilters\Packing\CreateDate::class,
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

        $pl_number_batch = PackingList::where('pl_batch',$batch)->max('pl_number_batch');


        $packinglists = collect();
        $packinglistsdummy = collect();
        $packinglistsqty = collect();
        for($x = 1; $x <= $pl_number_batch; $x++ ){

            $packinglists->add(PackingList::with('user')->where(
                [
                    ['pl_batch', $batch],
                    ['pl_number_batch', $x],
                ]
                )
                ->first());
            $packinglistsdummy->add(PackingList::with('user')->where(
                [
                    ['pl_batch', $batch],
                    ['pl_number_batch', $x],
                ]
            )
                ->get());

            $packinglistsqty->add($packinglistsdummy[$x-1]->sum('pl_order_quantity'));

        }

//
//        dd($packinglists);
//        dd($packinglists->sum('pl_order_quantity'));
        $packinglists->sortBy('pl_country');

//        dd($packinglists);

        return view('packing-list.batch', compact('packinglists','packinglistsqty'));

    }

    public function number($batch,$number){

        $packinglists = event(new GetPackingListDataOneEvent($batch,$number))[0];

//        dd($packinglists);

        return view('packing-list.number', compact('packinglists'));

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


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
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

    public function import()
    {

        $brandntype = request()->brandntype;
//        $type = explode('-',$brandntype)[1];

        $file = request()->file('file')->store('public/Import');

        $import = new PackingListsImport($brandntype);
        $import->onlySheets('Worksheet');
        Excel::import($import, $file);

        return redirect('/')->with('success', 'All good!');

    }



}
