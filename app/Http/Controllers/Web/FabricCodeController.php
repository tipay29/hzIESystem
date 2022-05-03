<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FabricCode;
use Illuminate\Http\Request;

class FabricCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $fabric_codes = FabricCode::paginate(10);
        if (request()->ajax()) {
            return view('fabric-code.index',compact('fabric_codes'));
        }
        return view('fabric-code.index',compact('fabric_codes'));
    }

}
