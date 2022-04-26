<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{

    public function index()
    {

        $styles = Style::with([
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
        $style = new Style();

        return view('style.create', compact('style'));
    }


    public function store(Request $request)
    {

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
        //
    }


    public function edit(Style $style)
    {
        return view('style.edit',compact('style'));
    }

    public function update(Style $style)
    {

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
        $style->purchase_orders()->detach();
        $style->fabric_colors()->detach();
        $style->fabric_codes()->detach();
        $style->fabric_types()->detach();
        $style->placements()->detach();
        $style->delete();

        return redirect(route('styles.index'));
    }

    protected function requestValidate(){
        return request()->validate([
            'purchase_order' => 'required|unique:purchase_orders,purchase_order',
            'style_code' => 'required|max:255|unique:styles,style_code',
            'placement' => 'required|array',
            'fabric_color' => 'required|array',
            'fabric_code' => 'required|array',
            'fabric_type' => 'required|array',
        ]);
    }
}
