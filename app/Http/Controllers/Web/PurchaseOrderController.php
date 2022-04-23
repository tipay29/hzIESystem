<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FabricCode;
use App\Models\FabricColor;
use App\Models\FabricType;
use App\Models\Placement;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{

    public function index()
    {

        $purchase_orders = PurchaseOrder::with([
            'fabric_colors',
            'fabric_codes',
            'fabric_types',
            'placements'
            ])
            ->paginate(10);

        if (request()->ajax()) {
            return view('purchase-order.index',compact('purchase_orders'));
        }

       return view('purchase-order.index', compact('purchase_orders'));

    }


    public function create()
    {

        $purchase_order = new PurchaseOrder();

        return view('purchase-order.create', compact('purchase_order'));

    }


    public function store()
    {

        $data = $this->requestValidate();

        $purchase_order = PurchaseOrder::create([
            'purchase_order' => $data['purchase_order'],
            'style_code' => strtoupper($data['style_code']),
        ]);

        $purchase_order->placements()->sync($data['placement']);
        $purchase_order->fabric_colors()->sync($data['fabric_color']);
        $purchase_order->fabric_codes()->sync($data['fabric_code']);
        $purchase_order->fabric_types()->sync($data['fabric_type']);

        return redirect(route('purchase-orders.index'));

    }


    public function show(PurchaseOrder $purchaseOrder)
    {
            //no show
    }

    public function edit(PurchaseOrder $purchase_order)
    {
        return view('purchase-order.edit',compact('purchase_order'));
    }


    public function update(Request $request, PurchaseOrder $purchase_order)
    {
        $data = $this->requestValidate();

        $purchase_order->update([
            'purchase_order' => $data['purchase_order'],
            'style_code' => strtoupper($data['style_code']),
        ]);

        $purchase_order->placements()->sync($data['placement']);
        $purchase_order->fabric_colors()->sync($data['fabric_color']);
        $purchase_order->fabric_codes()->sync($data['fabric_code']);
        $purchase_order->fabric_types()->sync($data['fabric_type']);

        return redirect(route('purchase-orders.index'));

    }


    public function destroy(PurchaseOrder $purchase_order)
    {

        $purchase_order->fabric_colors()->detach();
        $purchase_order->fabric_codes()->detach();
        $purchase_order->fabric_types()->detach();
        $purchase_order->placements()->detach();
        $purchase_order->delete();

        return redirect(route('purchase-orders.index'));
    }



    protected function requestValidate(){
        return request()->validate([
            'purchase_order' => 'required|unique:purchase_orders,purchase_order',
            'style_code' => 'required|max:255',
            'placement' => 'required|array',
            'fabric_color' => 'required|array',
            'fabric_code' => 'required|array',
            'fabric_type' => 'required|array',
        ]);
    }
}
