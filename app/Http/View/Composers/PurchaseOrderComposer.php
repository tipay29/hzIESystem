<?php


namespace App\Http\View\Composers;



use App\Models\PurchaseOrder;
use App\Models\Style;
use Illuminate\View\View;

class PurchaseOrderComposer
{

    public function compose(View $view){




        $view->with('purchase_orders', PurchaseOrder::all());

    }

}
