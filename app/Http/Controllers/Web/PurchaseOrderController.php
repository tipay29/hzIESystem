<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{

    public function index()
    {
        $purchase_orders = PurchaseOrder::all();

       return view('purchase-order.index', compact('purchase_orders'));
    }


    public function create()
    {

        $purchase_order = new PurchaseOrder();

        return view('purchase-order.create', compact('purchase_order'));

    }


    public function store(Request $request)
    {

    }


    public function show(PurchaseOrder $purchaseOrder)
    {

    }

    public function edit(PurchaseOrder $purchaseOrder)
    {

    }


    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {

    }


    public function destroy(PurchaseOrder $purchaseOrder)
    {

    }
}
