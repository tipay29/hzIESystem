@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">{{__('text.Cut')}} {{$cut->id}}  {{__('text.Details')}}</h5>


                        <div>

                                @can('update',$cut)
                                <a href="{{route('cuts.edit', $cut->id)}}"
                                   class="btn btn-outline-warning">
                                    {{__('text.Edit')}} </a>


                                <form style="display:inline;" action="{{route('cuts.destroy', $cut->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" onclick="return confirm('Delete CutID {{$cut->id}}  ?')" >

                                        {{__('text.Delete')}}
                                    </button>
                                </form>
                                @endcan

                        </div>


                    </div>

                    <div class="card-body d-flex justify-content-around">

                        <div id="cut-show-div-one">
                            <div>
                                <strong>
                                    {{__('text.Cut') .' '. __('text.ID')}}
                                </strong>
                                <p>
                                   {{$cut->id}}
                                </p>
                            </div>




                            <div>
                                <strong>
                                    {{__('text.MarkerLength')}}
                                </strong>
                                <p>
                                    {{$cut->marker_length}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.TotalLayers')}}
                                </strong>
                                <p>
                                    {{$cut->layer_count}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.TotalParts')}}
                                </strong>
                                <p>
                                    {{$cut->part_count}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.SizeRatio')}}
                                </strong>
                                <p>
                                    {{$cut->size_ratio}}
                                </p>
                            </div>

                            <div>
                                <strong>
                                    {{__('text.Table')}}
                                </strong>
                                <p>
                                    {{$cut->table_num}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.WorkTime')}}
                                </strong>
                                <p>
                                    {{$cut->work_hours}}
                                </p>
                            </div>

                        </div>

                        <div id="cut-show-div-two">


                            <div>
                                <strong>
                                    {{__('text.Spreader')}}
                                </strong>
                                @foreach($cut->employees as $employee)
                                    @if($employee->job->job === 'Spreader')
                                    <p>
                                        {{$employee->id . ' ' . $employee->name }} ,
                                    </p>
                                    @endif
                                @endforeach
                            </div>

                            <div>
                                <strong>
                                    {{__('text.Cutter')}}
                                </strong>
                                @foreach($cut->employees as $employee)
                                    @if($employee->job->job === 'Cutter')
                                        <p>
                                          {{$employee->id . ' ' . $employee->name }} ,
                                        </p>
                                    @endif
                                @endforeach
                            </div>

                            <div>
                                <strong>
                                    {{__('text.SpreadStart(date/time)')}}
                                </strong>
                                <p>
                                    {{$cut->spread_start}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.SpreadEnd(date/time)')}}
                                </strong>
                                <p>
                                    {{$cut->spread_end}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.CutStart(date/time)')}}
                                </strong>
                                <p>
                                    {{$cut->cut_start}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.CutEnd(date/time)')}}
                                </strong>
                                <p>
                                    {{$cut->cut_end}}
                                </p>
                            </div>


                        </div>

                        
                        
                        <div id="cut-show-div-three">

                            <div>
                                <strong>
                                    {{__('text.Style')}}
                                </strong>
                                <p>
                                    @foreach($cut->styles as $style)
                                        {{$style->style_code}}
                                    @endforeach
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.PurchaseOrders')}}
                                </strong>
                                <p>
                                    @foreach($cut->purchase_orders as $purchase_order)
                                        {{$purchase_order->purchase_order}} ,
                                    @endforeach
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.FabricColors')}}
                                </strong>
                                <p>
                                    @foreach($cut->fabric_colors as $fabric_color)
                                        {{$fabric_color->fabric_color}} ,
                                    @endforeach
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.ColorCodes')}}
                                </strong>
                                <p>
                                    @foreach($cut->fabric_codes as $fabric_code)
                                        {{$fabric_code->fabric_code}} ,
                                    @endforeach
                                </p>
                            </div>

                            <div>
                                <strong>
                                    {{__('text.FabricTypes')}}
                                </strong>
                                <p>
                                    @foreach($cut->fabric_types as $fabric_type)
                                        {{$fabric_type->fabric_type}} ,
                                    @endforeach
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.FabricCodes')}}
                                </strong>
                                <p>
                                    @foreach($cut->placements as $placement)
                                        {{$placement->placement}} ,
                                    @endforeach
                                </p>
                            </div>

                            <div>
                                <strong>
                                    {{__('text.User')}}
                                </strong>
                                <p>
                                    {{$cut->user->name}}
                                </p>
                            </div>
                            <div>
                                <strong>
                                    {{__('text.Building')}}
                                </strong>
                                <p>
                                    {{$cut->building->building}}
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

