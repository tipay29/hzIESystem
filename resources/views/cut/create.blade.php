@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Cut</h5>

                        <div>

{{--                            <a href="{{route('cuts.create')}}"--}}
{{--                               class="btn btn-outline-success float-right">--}}
{{--                                Add Cut </a>--}}

{{--                            put left button here--}}

                        </div>

                    </div>

                        <div class="card-body">


                            <form  id="cutForm" action="{{route('cuts.store')}}" method="post">
                                <div class="container-one">

                                    <div class="row-one d-flex flex-column">

                                        <div class="form-group">
                                            <label>Purchase Order

                                                <a class="btn btn-success btn-xsm" href="{{route('purchase-orders.create')}}">
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                </a>
                                            </label>

                                            <select id="purchase_order" data-placeholder="Select purchase order"
                                                    multiple class="chosen-select form-control" name="purchase_order[]">
                                                <option value="1">American Black Bear</option>
                                                <option value="2">Asiatic Black Bear</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="cut_count">Cut Count</label>
                                            <input id="cut_count" name='cut_count' type="number" class="form-control"
                                                   placeholder="Enter Cut Count">
                                        </div>

                                    </div>

                                   <div class="row-two d-flex align-items-start flex-column flex-wrap">

                                       <div class="form-group">
                                           <label for="table_num">Table</label>
                                           <select id="table_num" class="form-control" name="table_num" >
                                               <option disabled selected>Select table number</option>
                                               @for($i = 1; $i < 16; $i++)
                                                   <option value="{{$i}}">{{$i}}</option>
                                               @endfor
                                           </select>
                                       </div>

                                       <div class="form-group">
                                           <label for="work_hours">Work Hours

                                           </label>
                                           <select id="work_hours" class="form-control"  name="work_hours">
                                               <option disabled selected>Select work hours</option>
                                               @for($i = 8; $i <= 14; $i+=2)
                                                   <option value="{{$i}}">{{$i}}</option>
                                               @endfor
                                           </select>
                                       </div>



                                       <div class="form-group">
                                           <label for="marker_length">Marker Length</label>
                                           <input id="marker_length" name='marker_length' type="number" class="form-control"
                                                  placeholder="Enter Marker Length">
                                       </div>

                                       <div class="form-group">
                                           <label for="layer_num">Layers</label>
                                           <input id="layer_num" name='layer_num' type="number" class="form-control"
                                                  placeholder="Enter Total Layers">
                                       </div>

                                       <div class="form-group">
                                           <label for="parts_num">Parts</label>
                                           <input id="parts_num" name='parts_num' type="number" class="form-control"
                                                  placeholder="Enter Total Parts">
                                       </div>
                                       <div class="form-group">
                                           <label for="size_ratio">Size Ratio</label>
                                           <input id="size_ratio" name='size_ratio' type="number" class="form-control"
                                                  placeholder="Enter Size Ratio">
                                       </div>

                                   </div>
                                    <div class="row-three d-flex align-items-start flex-column flex-wrap">


                                        <h6 class="px-2 mt-2">Spread details</h6>


                                        <div class="form-group">
                                            <label>Spreader
                                                <button id="btn-add-spreader" class="btn btn-success btn-xsm">
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                </button>
                                            </label>

                                            <select id="spreader_id" data-placeholder="Choose spreader"
                                                    multiple class="chosen-select form-control" name="spreader_id[]">
                                                @foreach($employees as $employee)
                                                    @if($employee->job_id == 5)
                                                        <option value="{{$employee->id}}">{{$employee->id}} {{$employee->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="spread_start">Spread Start</label>
                                            <input id="spread_start" name='spread_start' type="datetime-local"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="spread_end">Spread End</label>
                                            <input id="spread_end" name='spread_end' type="datetime-local"
                                                   class="form-control">
                                        </div>

                                        <h6 class="px-2 mt-2" >Cut details</h6>

                                        <div class="form-group">
                                            <label>Cutter
                                                <button id="btn-add-cutter" class="btn btn-success btn-xsm">
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                </button>
                                            </label>

                                            <select id="cutter_id" data-placeholder="Choose cutter"
                                                    multiple class="chosen-select form-control" name="cutter_id[]">
                                                @foreach($employees as $employee)
                                                    @if($employee->job_id == 4)
                                                        <option value="{{$employee->id}}">{{$employee->id}} {{$employee->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="cutter_start">Cut Start</label>
                                            <input id="cutter_start" name='cutter_start' type="datetime-local"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="cutter_end">Cut End</label>
                                            <input id="cutter_end" name='cutter_end' type="datetime-local"
                                                   class="form-control">
                                        </div>

                                    </div>


                                @csrf
                                </div>


                                  <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>

                                  </div>

                            </form>


                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
