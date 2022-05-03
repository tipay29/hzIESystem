<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FabricColor;
use Illuminate\Http\Request;

class FabricColorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $fabric_colors = FabricColor::paginate(10);
        if (request()->ajax()) {
            return view('fabric-color.index',compact('fabric_colors'));
        }
        return view('fabric-color.index',compact('fabric_colors'));
    }

}
