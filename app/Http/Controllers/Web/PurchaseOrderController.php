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


    public function store(Request $request)
    {

        $purchase_order = PurchaseOrder::create([
            'purchase_order' => $this->requestValidate()['purchase_order'],
            'style_code' => strtoupper($this->requestValidate()['style_code']),
        ]);

        $purchase_order->placements()->sync($this->requestValidate()['placement']);
        $purchase_order->fabric_colors()->sync($this->requestValidate()['fabric_color']);
        $purchase_order->fabric_codes()->sync($this->requestValidate()['fabric_code']);
        $purchase_order->fabric_types()->sync($this->requestValidate()['fabric_type']);

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

        $purchase_order->placements()->sync($this->requestValidate()['placement']);
        $purchase_order->fabric_colors()->sync($this->requestValidate()['fabric_color']);
        $purchase_order->fabric_codes()->sync($this->requestValidate()['fabric_code']);
        $purchase_order->fabric_types()->sync($this->requestValidate()['fabric_type']);

        return redirect(route('purchase-orders.index'));

    }


    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return redirect(route('purchase-orders.index'));
    }

    protected function requestValidate(){
        return request()->validate([
            'purchase_order' => 'required',
            'style_code' => 'required|max:255',
            'placement' => 'required|array',
            'fabric_color' => 'required|array',
            'fabric_code' => 'required|array',
            'fabric_type' => 'required|array',
        ]);
    }
}
