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
use Maatwebsite\Excel\Facades\Excel;
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

        $pl_batch = PackingList::max('pl_batch');

        $packinglists = collect();

        for($x = 1; $x <= $pl_batch; $x++ ){
            $packinglists->add(PackingList::with('user')->where('pl_batch',$x)->first());
        }

        $packinglists = $packinglists->reverse();

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

        for($x = 1; $x <= $pl_number_batch; $x++ ){

            $packinglists->add(PackingList::with('user')->where(
                [
                    ['pl_batch', $batch],
                    ['pl_number_batch', $x],
                ]
                )
                ->first());

        }

        $packinglists->sortBy('pl_country');

        return view('packing-list.batch', compact('packinglists'));

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


    public function destroy($id)
    {
        //
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
