<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use Illuminate\Http\Request;

class PlacementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $placements = Placement::paginate(10);
        if (request()->ajax()) {
            return view('placement.index',compact('placements'));
        }
        return view('placement.index',compact('placements'));
    }


}
