<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carton;
use Illuminate\Http\Request;

class CartonController extends Controller
{

    public function index()
    {
        $cartons = Carton::with(['brand'])->paginate(20);

        return view('carton.index', compact('cartons'));
    }

    public function create()
    {
        $carton = new Carton();

        return view('carton.create', compact('carton'));
    }

    public function store(Request $request)
    {
        $carton = Carton::create($this->requestValidate());

        return redirect(route('cartons.index'));
    }

    public function edit(Carton $carton)
    {
        return view('carton.edit',compact('carton'));
    }

    public function update(Carton $carton)
    {
        $carton->update($this->requestValidate());

        return redirect(route('cartons.index'));
    }


    public function destroy(Carton $carton)
    {
        $carton->delete();

        return redirect(route('cartons.index'));

    }

    protected function requestValidate(){
        return request()->validate([
            'brand_id' => 'required',
            'ctn_size' => 'required',
            'ctn_weight' => 'required',
        ]);
    }
}
