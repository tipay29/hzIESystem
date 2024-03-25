<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Imports\StyleMCQImport;
use App\Imports\StyleWeightImport;
use App\Models\PurchaseOrder;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StyleController extends Controller
{

    public function __construct()
    {


    }

    public function attach(Style $style){

        dd(request()->all());
    }

    public function index()
    {


        $styles = app(Pipeline::class)
            ->send(
                Style::query()
            )
            ->through([
                \App\QueryFilters\Style\Style::class,

            ])
            ->thenReturn()
            ->with([
                'purchase_orders',
                'fabric_colors',
                'fabric_codes',
                'fabric_types',
                'placements'
            ])
            ->paginate(10);

        if (request()->ajax()) {
            return view('style.index',compact('styles'));
        }

        return view('style.index', compact('styles'));
    }


    public function create()
    {
        $this->authorize('create',Style::class);

        $style = new Style();

        return view('style.create', compact('style'));
    }


    public function store(Request $request)
    {

        $this->authorize('create',Style::class);

        $style = Style::create([
            'style_code' => strtoupper($this->requestValidate()['style_code']),
        ]);
        $style->purchase_orders()->sync(request()->purchase_order);
        $style->placements()->sync(request()->placement);
        $style->fabric_colors()->sync(request()->fabric_color);
        $style->fabric_codes()->sync(request()->fabric_code);
        $style->fabric_types()->sync(request()->fabric_type);

        return redirect(route('styles.index'));
    }

    public function show(Style $style)
    {
//        dd($style->sizes[0]->pivot);

        return view('style.show',compact('style'));
    }


    public function edit(Style $style)
    {
        $this->authorize('update',$style);

        return view('style.edit',compact('style'));
    }

    public function update(Style $style)
    {
        $this->authorize('update',$style);
        $style->update([
            'style_code' => strtoupper(request()->style_code)
        ]);
        $style->purchase_orders()->sync(request()->purchase_order);
        $style->placements()->sync(request()->placement);
        $style->fabric_colors()->sync(request()->fabric_color);
        $style->fabric_codes()->sync(request()->fabric_code);
        $style->fabric_types()->sync(request()->fabric_type);

        return redirect(route('styles.index'));
    }


    public function destroy(Style $style)
    {
        $this->authorize('delete',$style);

        $style->purchase_orders()->detach();
        $style->fabric_colors()->detach();
        $style->fabric_codes()->detach();
        $style->fabric_types()->detach();
        $style->placements()->detach();
        $style->delete();

        return redirect(route('styles.index'));
    }

    public function destroyMCQ($id)
    {

        $style_mcq = DB::table('sizeables')->where('id', '=', $id)->first();

        $style = Style::where('id',$style_mcq->sizeable_id)->first();

        $style->sizes()->wherePivot('id',$id)->detach($style_mcq->size_id);

        return redirect()->back();
    }

    public function editweights()
    {

       return view('style.editweight');
    }

    public function updateweights()
    {
        $file = request()->file('file');

//        dd($file);
//
        $import = new StyleWeightImport();
//        $import->onlySheets('Worksheet');

        Excel::import($import, $file);

        return 0;
    }

    public function editmcqs()
    {

        return view('style.editmcq');
    }

    public function updatemcqs()
    {
        $file = request()->file('file');

//        dd($file);

        $import = new StyleMCQImport();
//        $import->onlySheets('Worksheet');

        Excel::import($import, $file);

        return 0;
    }

    protected function requestValidate(){
        return request()->validate([
            'purchase_order' => 'unique:purchase_orders,purchase_order',
            'style_code' => 'required|max:255|unique:styles,style_code',
            'placement' => 'array',
            'fabric_color' => 'array',
            'fabric_code' => 'array',
            'fabric_type' => 'array',
        ]);
    }
}
