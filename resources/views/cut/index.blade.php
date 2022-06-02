@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Cut').' '.__('text.List')}}</h5>

                        <div>

                            @can('create', App\Models\Cut::class)
                            <a href="{{route('cuts.create')}}"
                               class="btn btn-outline-success">
                                {{__('text.AddCuttingReport')}} </a>
                            @endcan
                            @can('viewUtil', App\Models\Cut::class)
                            <a href="{{route('cuts.util')}}"
                               class="btn btn-outline-success">
                                {{__('text.CuttingReport'). '1'}} </a>
                            @endcan
                            @can('viewTotalUtil',App\Models\Cut::class)
                                    <a href="{{route('cuts.total-util')}}"
                                       class="btn btn-outline-success">
                                        {{__('text.CuttingReport'). '2'}} </a>
                            @endcan


                        </div>

                    </div>

                    <div class="card-body cut-container">

                        <form action="{{route('cuts.index')}}" method="get">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-2">
                                    <small for="fi_style">{{__('text.Style')}}</small>
                                    <input id="fi_style" type="text" class="form-control"
                                           value="{{request('fi_style')}}" name="fi_style">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_purchase_order">{{__('text.PurchaseOrder')}}</small>
                                    <input id="fi_purchase_order" type="text" class="form-control"
                                           value="{{request('fi_purchase_order')}}" name="fi_purchase_order">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_fabric_color">{{__('text.FabricColor')}}</small>
                                    <input id="fi_fabric_color" type="text" class="form-control"
                                           value="{{request('fi_fabric_color')}}" name="fi_fabric_color">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_color_code">{{__('text.ColorCode')}}</small>
                                    <input id="fi_color_code" type="text" class="form-control"
                                           value="{{request('fi_color_code')}}" name="fi_color_code">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_fabric_type">{{__('text.FabricType')}}</small>
                                    <input id="fi_fabric_type" type="text" class="form-control"
                                           value="{{request('fi_fabric_type')}}" name="fi_fabric_type">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_fabric_code">{{__('text.FabricCode')}}</small>
                                    <input id="fi_fabric_code" type="text" class="form-control"
                                           value="{{request('fi_fabric_code')}}"  name="fi_fabric_code">
                                </div>


                            </div>
                            <div class="row mt-1">
                                <div class="col-md-2">
                                    <small for="fi_building">{{__('text.Building')}}</small>
                                    <input maxlength="1" id="fi_building" type="text" class="form-control"
                                           value="{{request('fi_building')}}" name="fi_building">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_table">{{__('text.Table')}}</small>
                                    <input maxlength="2" id="fi_table" type="text" class="form-control"
                                           value="{{request('fi_table')}}" name="fi_table">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_date_one">{{__('text.Date')}}1</small>
                                    <input id="fi_date_one" type="date" class="form-control"
                                           value="{{request('fi_date_one')}}" name="fi_date_one">
                                </div>
                                <div class="col-md-2">
                                    <small for="fi_date_two">{{__('text.Date')}}2</small>
                                    <input id="fi_date_two" type="date" class="form-control"
                                           value="{{request('fi_date_two')}}" name="fi_date_two">
                                </div>
                                <div class="col-md-2">
                                    <button id="fi_btn_clear" style="height: 100%;" class="btn form-control btn-primary">
                                        {{__('text.Clear')}}</button>
                                </div>
                                <div class="col-md-2">
                                    <button id="fi_btn_apply" style="height: 100%;" class="btn form-control btn-primary">
                                        {{__('text.Search')}}</button>
                                </div>
                            </div>








                            

                        </div>
                        </form>




                        <div class="table-responsive">
                            <table class="table table ">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">{{__('text.Cut').' '.__('text.ID')}}</th>
                                        <th width="10%" scope="col">{{__('text.Style')}}</th>
                                        <th width="15%" scope="col">{{__('text.PurchaseOrder')}}</th>
                                        <th width="5%" scope="col">{{__('text.Building')}}</th>
                                        <th width="5%" scope="col">{{__('text.Table')}}#</th>
                                        <th width="18%" scope="col">{{__('text.SpreadStart(date/time)')}}</th>
                                        <th width="18%" scope="col">{{__('text.CutStart(date/time)')}}</th>
                                        <th width="15%" scope="col">{{__('text.User')}}</th>
                                        @can('create', App\Models\Cut::class)
                                        <th width="4%" scope="col">{{__('text.Option')}}</th>
                                        @endcan
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($cuts as $cut)
                                    <tr>
                                        <td  scope="row">
                                            @can('view',$cut)
                                            <a href="{{route('cuts.show', $cut->id)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                {{$cut->id}} </a>
                                            @endcan
                                            @cannot('view',$cut)
                                                    {{$cut->id}}
                                            @endcannot
                                        </td>
                                        <td  scope="row">
                                            @foreach($cut->styles as $style)
                                                {{$style->style_code}}
                                            @endforeach
                                        </td>
                                        <td  scope="row">
                                            @foreach($cut->purchase_orders as $purchase_order)
                                                {{$purchase_order->purchase_order}}
                                            @endforeach
                                        </td>
                                        <td  scope="row">
                                            {{$cut->building->building}}
                                        </td>
                                        <td  scope="row">
                                            {{$cut->table_num}}
                                        </td>
                                        <td  scope="row">
                                            {{$cut->spread_start}}</td>
                                        <td  scope="row">
                                            {{$cut->cut_start}}</td>
                                        <td  scope="row">
                                            {{$cut->user->name}}
                                        </td>
                                        @can('update',$cut)
                                            <td  scope="row">

                                                <a style="text-decoration: none;color:darkorange;" href="{{route('cuts.edit', $cut->id)}}" >
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>

                                                <form style="display:inline;" action="{{route('cuts.destroy', $cut->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border: none;background-color: white;color:darkred;"
                                                            onclick="return confirm('Delete CutID {{$cut->id}}  ?')" >
                                                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>

                                            </td>
                                        @endcan




                                    </tr>
                                @endforeach
                                </tbody>


                            </table>


                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                {{$cuts->withQueryString()->onEachSide(2)->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
