<?php

namespace App\Http\Controllers\Web;

use App\Exports\CartonOrderExport;
use App\Models\CartonOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CartonOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carton_orders = CartonOrder::with('carton_order_contents')->paginate(10)->sortByDesc('id');

        return view('carton-order.index',compact('carton_orders'));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartonOrder  $cartonOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CartonOrder $carton_order)
    {
        $carton_order->load(['carton_order_contents']);



        return view('carton-order.order-show', compact('carton_order'));
    }

    public function export(CartonOrder $cartonorder){
        $cartonorder->load('carton_order_contents');
//        dd($cartonorder);
        $excel = Excel::download(new CartonOrderExport($cartonorder), 'carton-form.xlsx');

        return $excel;
    }

    public function edit(CartonOrder $cartonOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartonOrder  $cartonOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartonOrder $cartonOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartonOrder  $cartonOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartonOrder $cartonOrder)
    {
        //
    }
}
