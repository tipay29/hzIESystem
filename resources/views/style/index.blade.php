

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{ __('text.Style') .' '. __('text.List') }}</h5>

                        <div class="d-flex justify-content-end">
                            @can('create', App\Models\Style::class)
                            <a href="{{route('styles.create')}}"
                               class="btn btn-outline-success" style="margin-right: 10px;">
                                {{ __('text.Add') .' '. __('text.Style') }} </a>
                            @endcan

                                <form action="{{route('styles.index')}}" method="get">
                                    @csrf
                            <div class="input-group">



                                <input type="text" class="form-control" placeholder="Search Style" id="s_style" name="s_style">
                                <button class="input-group-text" ><i class="fa fa-search" aria-hidden="true"></i></button>

                            </div>
                                </form>

                        </div>

                    </div>

                    <div class="card-body style-container">


                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                <tr>
                                    <th width="10%" scope="col">{{ __('text.Styles') }} </th>
                                    <th width="18%" scope="col">{{ __('text.PurchaseOrders') }} </th>
                                    <th width="15%" scope="col">{{ __('text.ColorCodes') }} </th>
                                    <th width="18%" scope="col">{{ __('text.FabricColors') }} </th>
                                    <th width="18%" scope="col">{{ __('text.FabricTypes') }}</th>
                                    <th width="16%" scope="col">{{ __('text.FabricCodes') }}</th>
                                    @can('create',App\Models\Style::class)
                                    <th width="5%" scope="col">{{ __('text.Option') }}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($styles as $style)


                                        <tr>
                                            <td>
                                                <a href="{{route('styles.show', $style->id)}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{$style->style_code}} </a>

                                            </td>

                                            <td>
                                                @if(count($style->purchase_orders) === 1)
                                                    {{$style->purchase_orders[0]->purchase_order}}
                                                @else
                                                    @foreach($style->purchase_orders as $purchase_order)
                                                        {{$purchase_order->purchase_order}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($style->fabric_codes) === 1)
                                                    {{$style->fabric_codes[0]->fabric_code}}
                                                @else
                                                    @foreach($style->fabric_codes as $fabric_code)
                                                        {{$fabric_code->fabric_code}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($style->fabric_colors) === 1)
                                                    {{$style->fabric_colors[0]->fabric_color}}
                                                @else
                                                    @foreach($style->fabric_colors as $fabric_color)
                                                        {{$fabric_color->fabric_color}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($style->fabric_types) === 1)
                                                    {{$style->fabric_types[0]->fabric_type}}
                                                @else
                                                    @foreach($style->fabric_types as $fabric_type)
                                                        {{$fabric_type->fabric_type}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($style->placements) === 1)
                                                    {{$style->placements[0]->placement}}
                                                @else
                                                    @foreach($style->placements as $placement)
                                                        {{$placement->placement}} ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            @can('update',$style)
                                                <td>


                                                        <a style="text-decoration: none;color:darkorange;" href="{{route('styles.edit', $style->id)}}" >
                                                            <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>

                                                        <form style="display:inline;" action="{{route('styles.destroy', $style->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="border: none;background-color: white;color:darkred;"
                                                                    onclick="return confirm('Delete PO#{{$style->id}}  ?')" >
                                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>

                                                </td>
                                            @endcan
                                        </tr>
                                    @empty
                                        <h3 class="text-danger">No Purchase Order Available!</h3>
                                    @endforelse

                                </tbody>


                            </table>

                        </div>


                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                {{$styles->onEachSide(2)->withQueryString()->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
