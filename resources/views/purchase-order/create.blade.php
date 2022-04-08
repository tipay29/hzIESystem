@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Purchase Order</h5>

                        <div>

{{--                            <a href="{{route('purchase-orders.create')}}"--}}
{{--                               class="btn btn-outline-success float-right">--}}
{{--                                Add Purchase Order </a>--}}

                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{route('purchase-orders.store')}}" method="post">

                            <div class="row mb-3">
                                <label for="purchase_order" class="col-md-4 col-form-label text-md-end">Purchase Order</label>
                                <div class="col-md-7">
                                <input id="purchase_order" name='purchase_order' type="text" class="form-control"
                                       placeholder="Enter PO number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="style_code" class="col-md-4 col-form-label text-md-end">Style</label>
                                <div class="col-md-7">
                                <input id="style_code" name='style_code' type="text" class="form-control" placeholder="Enter style code">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="t_num" class="col-md-4 col-form-label text-md-end">T#</label>
                                <div class="col-md-7">
                                <input id="t_num" name='t_num' type="text" class="form-control" placeholder="Enter T number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="placement" class="col-md-4 col-form-label text-md-end">Placement</label>
                                <div class="col-md-7">
                                <input id=placement" name='placement' type="text" class="form-control" placeholder="Enter placement">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Fabric Color
                                    <button id="btn-add-fabric-color-modal" class="btn btn-success btn-xsm">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    </button>
                                    <button id="btn-del-fabric-color-modal" class="btn btn-danger btn-xsm"
                                            onclick="return confirm('Are you sure to delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </label>
                                <div class="col-md-7">
                                    <select id="fabric_color" data-placeholder="Select fabric color"
                                            multiple class="chosen-select form-control" name="fabric_color[]">
                                       @foreach($fabric_colors as $fabric_color)
                                            <option value="{{$fabric_color->id}}">{{$fabric_color->fabric_color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">Fabric Code
                                    <button id="btn-add-fabric-code-modal" class="btn btn-success btn-xsm">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    </button>
                                    <button id="btn-del-fabric-code-modal" class="btn btn-danger btn-xsm"
                                            onclick="return confirm('Are you sure to delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </label>
                                <div class="col-md-7">
                                    <select id="fabric_code" data-placeholder="Select fabric code"
                                            multiple class="chosen-select form-control" name="fabric_code[]">
                                        @foreach($fabric_codes as $fabric_code)
                                            <option value="{{$fabric_code->id}}">{{$fabric_code->fabric_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Fabric Type
                                </label>
                                <div class="col-md-7">
                                        <select id="fabric_type" class="form-control"  name="fabric_type[]">
                                            <option value="" disabled selected>Select fabric type</option>
                                            @foreach($fabric_types as $fabric_type)
                                                <option value="{{$fabric_type->id}}">{{$fabric_type->fabric_type}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            @csrf
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save Purchase Order</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

{{--        include modal here--}}
        @include('modal.fabric-color-add-modal')
        @include('modal.fabric-code-add-modal')
        @include('modal.fabric-type-add-modal')
    </div>

@endsection
