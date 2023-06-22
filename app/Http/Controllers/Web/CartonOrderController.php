<?php

namespace App\Http\Controllers\Web;

use App\Models\CartonOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartonOrder  $cartonOrder
     * @return \Illuminate\Http\Response
     */
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
