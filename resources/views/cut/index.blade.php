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
                                {{__('text.Add').' '.__('text.Cut')}} </a>
                            @endcan
                            @can('viewUtil', App\Models\Cut::class)
                            <a href="{{route('cuts.util')}}"
                               class="btn btn-outline-success">
                                {{__('text.Cut').' '.__('text.Util')}} </a>
                            @endcan
                            @can('viewTotalUtil',App\Models\Cut::class)
                                    <a href="{{route('cuts.total-util')}}"
                                       class="btn btn-outline-success">
                                        {{__('text.Total').' '.__('text.Cut') .' '. __('text.Util')}} </a>
                            @endcan

                        </div>

                    </div>

                    <div class="card-body">







                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">{{__('text.Cut').' '.__('text.ID')}}</th>
                                        <th width="5%" scope="col">{{__('text.Cut')}}#</th>
                                        <th width="10%" scope="col">{{__('text.Style')}}</th>
                                        <th width="15%" scope="col">{{__('text.PurchaseOrder')}}</th>
                                        <th width="5%" scope="col">{{__('text.Building')}}</th>
                                        <th width="5%" scope="col">{{__('text.Table')}}</th>
                                        <th width="18%" scope="col">{{__('text.Spread').' '. __('text.Date') .''. __('text.Time')}}</th>
                                        <th width="18%" scope="col">{{__('text.Cut').' '. __('text.Date') .''. __('text.Time')}}</th>
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
                                            {{$cut->cut_count}}
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
                                                            onclick="return confirm('Delete CutID {{$style->id}}  ?')" >
                                                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>

                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
