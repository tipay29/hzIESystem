<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductionEvent;
use Illuminate\Http\Request;

class ProductionEventController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny',ProductionEvent::class);

        $production_events = ProductionEvent::paginate(10);
        if (request()->ajax()) {
            return view('production-event.index',compact('production_events'));
        }
        return view('production-event.index',compact('production_events'));
    }


}
