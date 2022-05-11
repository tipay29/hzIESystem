@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-around placement_row">
            <div class="col-md-5 ">
                <div class="card purchase_order_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.PurchaseOrders')}}</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id="purchase-order-container">

                            <table class="table purchase_order_table">
                                <thead>
                                <tr>
                                    <th width="20%">{{__('text.ID')}}</th>
                                    <th width="70%">{{__('text.PurchaseOrder')}}</th>
                                    @can('create',App\Models\PurchaseOrder::class)
                                        <th>{{__('text.Option')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($purchase_orders as $key => $purchase_order)
                                    <tr>
                                        <td>{{ $purchase_order->id }}</td>
                                        <td>{{ $purchase_order->purchase_order }}</td>
                                        @can('update',$purchase_order)
                                            <td>

                                                    <button type='button' style="text-decoration: none;
                                                    color:darkorange;border:none;padding:0px;background-color: white;"
                                                            class="btn_edit_purchase_order" value="{{$purchase_order->id}}">
                                                        <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                                    <button type='button' style="text-decoration: none;
                                                    border: none;background-color: white;color:darkred;padding:0px;"
                                                            class="btn_delete_purchase_order" value="{{$purchase_order->id}}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> </button>


                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$purchase_orders->render("pagination::bootstrap-4")}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-5 ">

                @can('create',App\Models\PurchaseOrder::class)
                <div class="card purchase_order_div_two">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Add') . ' ' . __('text.PurchaseOrder')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="purchase_order_create" class="col-md-4 col-form-label text-md-end">{{__('text.PurchaseOrder')}}</label>
                                <div class="col-md-7">

                                    <input id="purchase_order_create" type="text" class="form-control"
                                           placeholder="Enter Purchase Order">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button id="btn-save-purchase-order" class="btn btn-primary">{{__('text.Save') . ' ' . __('text.PurchaseOrder')}}</button>
                        </div>
                    </form>

                </div>
                @endcan


                <div class="card purchase_order_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Update') . ' ' . __('text.PurchaseOrder')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="purchase_order_edit" class="col-md-4 col-form-label text-md-end">{{ __('text.PurchaseOrder')}}</label>
                                <div class="col-md-7">

                                    <input id="purchase_order_edit" type="text" class="form-control"
                                           placeholder="Enter Purchase Order">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-purchase-order" class="btn btn-secondary">{{__('text.Cancel')}}</button>
                            <button id="btn-update-purchase-order" class="btn btn-primary">{{__('text.Update') . ' ' . __('text.PurchaseOrder')}}</button>
                        </div>
                    </form>


                </div>

            </div>


        </div>
@endsection
