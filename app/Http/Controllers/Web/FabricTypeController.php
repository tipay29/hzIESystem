<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FabricType;
use Illuminate\Http\Request;

class FabricTypeController extends Controller
{

    public function index()
    {
        $fabric_types = FabricType::paginate(10);
        if (request()->ajax()) {
            return view('fabric-type.index',compact('fabric_types'));
        }
        return view('fabric-type.index',compact('fabric_types'));
    }


}
