<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{

    public function index()
    {
        $purchase_orders = PurchaseOrder::paginate(10);
        if (request()->ajax()) {
            return view('purchase-order.index',compact('purchase_orders'));
        }
        return view('purchase-order.index',compact('purchase_orders'));

    }




}
