@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Carton Orders</h5>

                        <div>

                            <a href="{{route('packing-lists.allviews')}}"
                               class="btn btn-outline-secondary"
                            >Create</a>

                            <a href="{{route('cartons.index')}}"
                               class="btn btn-outline-secondary"
                            >View Carton</a>
                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                <tr>
                                    <th width="7%" scope="col">No </th>
                                    <th width="10%" scope="col">Bill Code</th>
                                    <th width="13%" scope="col">Order Date </th>
                                    <th width="15%" scope="col">Delivery Date </th>
                                    <th width="15%" scope="col">Brand </th>
                                    <th width="10%" scope="col">Type</th>
                                    <th width="10%" scope="col">Buy Month</th>
                                    <th width="10%" scope="col">Buy Year</th>
                                    <th width="20%" scope="col">Created By </th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($carton_orders as $key => $carton_order)
                                        <tr>
                                            <td scope="col">

                                                <a href="{{route('carton-orders.show', $carton_order->id)}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{$carton_order->id}} </a>

                                            </td>
                                            <td scope="col">{{$carton_order->ctn_bill_code}}</td>
                                            <td scope="col">{{$carton_order->ctn_order_date}} </td>
                                            <td scope="col">{{$carton_order->ctn_delivery_date}}</td>
                                            <td scope="col">Brand </td>
                                            <td scope="col">Type</td>
                                            <td scope="col">Buy Montd</td>
                                            <td scope="col">Buy Year</td>
                                            <td scope="col">{{$carton_order->user->name}} </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    @include('carton.order-modal')--}}

@endsection

