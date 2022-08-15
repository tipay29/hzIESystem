

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        PO Trace

                    </div>

                    <div class="card-body ">

                        <form action="{{route('po-traces.index')}}" method="get">
                            <div class="container-fluid p-0">
                                <div class="row justify-content-around">
                                    <div class="col-md-2">
                                        <small for="pot_factory_po">Factory PO</small>
                                        <input id="pot_factory_po" type="text" class="form-control"
                                               value="{{request('pot_factory_po')}}" name="pot_factory_po">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pot_po">PO</small>
                                        <input id="pot_po" type="text" class="form-control"
                                               value="{{request('pot_po')}}" name="pot_po">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pot_style_code">Style Code</small>
                                        <input id="pot_style_code" type="text" class="form-control"
                                               value="{{request('pot_style_code')}}" name="pot_style_code">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pot_style_desc">Style Desc</small>
                                        <input id="pot_style_desc" type="text" class="form-control"
                                               value="{{request('pot_style_desc')}}" name="pot_style_desc">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pot_style_color">Style Color</small>
                                        <input id="pot_style_color" type="text" class="form-control"
                                               value="{{request('pot_style_color')}}" name="pot_style_color">
                                    </div>

                                </div>

                                <div class="row mt-1 justify-content-around ">

                                    <div class="col-md-2">
                                        <small for="pot_style_color_name">Style Color Name</small>
                                        <input id="pot_style_color_name" type="text" class="form-control"
                                               value="{{request('pot_style_color_name')}}"  name="pot_style_color_name">
                                    </div>
                                        <div class="col-md-2">
                                            <small for="pot_size">Size</small>
                                            <input id="pot_size" type="text" class="form-control"
                                                   value="{{request('pot_size')}}" name="pot_size">
                                        </div>
                                        <div class="col-md-2">
                                            <small for="pot_status">Status</small>
                                            <input id="pot_status" type="text" class="form-control"
                                                   value="{{request('pot_status')}}" name="pot_status">
                                        </div>



                                        <div class="col-md-2">
                                            <button id="pot_btn_clear" style="height: 100%;" class="btn form-control btn-primary">
                                                {{__('text.Clear')}}</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="pot_btn_apply" style="height: 100%;" class="btn form-control btn-primary">
                                                {{__('text.Search')}}</button>
                                        </div>

                                </div>



                            </div>
                        </form>


                        <div class="table-responsive " id="employee-container">
                            <table class="table">


                                <thead>
                                    <tr>
                                        <th scope="col">Factory PO</th>
                                        <th scope="col">PO</th>
                                        <th scope="col">Style Code</th>
                                        <th scope="col">Style Desc</th>
                                        <th scope="col">Style Color</th>
                                        <th scope="col">SColor Name</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Orig Qty</th>
                                        <th scope="col">Accu Qty</th>
                                        <th scope="col">Bal Qty</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($po_traces as $key => $po_trace)
                                    <tr>
                                        <th scope="col">{{$po_trace->factory_po}}</th>
                                        <th scope="col">{{$po_trace->po_number}}</th>
                                        <th scope="col">{{$po_trace->style_code}}</th>
                                        <th scope="col">{{$po_trace->style_description}}</th>
                                        <th scope="col">{{$po_trace->style_color}}</th>
                                        <th scope="col">{{$po_trace->style_color_name}}</th>
                                        <th scope="col">{{$po_trace->size}}</th>
                                        <th scope="col">{{$po_trace->original_quantity}}</th>
                                        <th scope="col">{{$po_trace->accumulate_quantity}}</th>
                                        <th scope="col">
                                            {{intval($po_trace->original_quantity)
                                                -
                                               intval($po_trace->accumulate_quantity)}}
                                        </th>
                                        <th scope="col">{{$po_trace->status}}</th>

                                    </tr>

                                @empty

                                    <h3 class="text-danger">Please Upload New Order</h3>

                                @endforelse
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$po_traces->withQueryString()->onEachSide(5)->links()}}
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
