<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cut;
use Illuminate\Http\Request;

class CutController extends Controller
{

    public function index()
    {
        $cuts = Cut::all();

        return view('cut.index',compact('cuts'));
    }


    public function create()
    {
        $cut = new Cut();

        return view('cut.create', compact('cut'));
    }


    public function store(Request $request)
    {
        dd(request()->all());
    }

    public function show(Cut $cut)
    {

    }

    public function edit(Cut $cut)
    {

    }

    public function update(Request $request, Cut $cut)
    {

    }

    public function destroy(Cut $cut)
    {

    }
}
