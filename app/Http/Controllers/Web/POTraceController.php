<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\PpTracesImport;
use App\Models\Cut;
use App\Models\PoTrace;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Maatwebsite\Excel\Facades\Excel;

class POTraceController extends Controller
{

    public function index()
    {

        $po_traces = app(Pipeline::class)
            ->send(
                PoTrace::query()
            )
            ->through([
                \App\QueryFilters\PoTrace\FactoryPO::class,
                \App\QueryFilters\PoTrace\PO::class,
                \App\QueryFilters\PoTrace\StyleCode::class,
                \App\QueryFilters\PoTrace\StyleDesc::class,
                \App\QueryFilters\PoTrace\StyleColor::class,
                \App\QueryFilters\PoTrace\StyleColorName::class,
                \App\QueryFilters\PoTrace\Size::class,
                \App\QueryFilters\PoTrace\Status::class,
            ])
            ->thenReturn()
            ->orderBy('id', 'asc')
            ->paginate(50);

        if (request()->ajax()) {
            return view('po-trace.index',compact('po_traces'));
        }

        return view('po-trace.index',compact('po_traces'));

//
//        $po_traces = PoTrace::paginate(20);
//

//
//        return view('po-trace.index',compact('po_traces'));
    }

    public function create()
    {
        return view('po-trace.create');
    }

    public function store(Request $request)
    {

        $file = $request->file('file')->store('import');

        $import = new PpTracesImport();
        $import->onlySheets('Summary');

        Excel::import($import, $file);

        return redirect()->back();
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
