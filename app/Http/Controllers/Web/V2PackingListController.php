<?php

namespace App\Http\Controllers\Web;

use App\Imports\v2PackingList\V2PackingListImport;
use App\Models\v2PackingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class V2PackingListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index()
    {
        return view('v2-packing-list.index');
    }


    public function create()
    {
        $packinglist = new v2PackingList();

        return view('v2-packing-list.create', compact('packinglist'));
    }


    public function import()
    {

        $brandntype = request()->brandntype;
//        $type = explode('-',$brandntype)[1];

        $file = request()->file('file');

        $import = new V2PackingListImport($brandntype);
        $import->onlySheets('Worksheet');
        Excel::import($import, $file);

//        return v2PackingList::max('pl_batch');
        return 0;

    }


    public function show(v2PackingList $v2PackingList)
    {
        //
    }

    public function edit(v2PackingList $v2PackingList)
    {
        //
    }


    public function update(Request $request, v2PackingList $v2PackingList)
    {
        //
    }


    public function destroy(v2PackingList $v2PackingList)
    {
        //
    }
}
