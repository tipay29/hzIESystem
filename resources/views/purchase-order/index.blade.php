

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Purchase Order List</h5>

                        <div>

                            <a href="{{route('purchase-orders.create')}}"
                               class="btn btn-outline-success float-right">
                                Add Purchase Order </a>

                        </div>

                    </div>

                    <div class="card-body purchase-order-container">



                        <table class="table">
                            <thead>
                            <tr>
                                <th width="7.5%" scope="col">PO #</th>
                                <th width="7.5%" scope="col">Style</th>
                                <th width="20%" scope="col">Fabric Codes</th>
                                <th width="20%" scope="col">Fabric Colors</th>
                                <th width="20%" scope="col">Fabric Types</th>
                                <th width="20%" scope="col">Placements</th>
                                <th width="5%" scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($purchase_orders as $purchase_order)


                                    <tr>
                                        <td>{{$purchase_order->purchase_order}}</td>
                                        <td>{{$purchase_order->style_code}}</td>
                                        <td>
                                            @if(count($purchase_order->fabric_codes) === 1)
                                                {{$purchase_order->fabric_codes[0]->fabric_code}}
                                            @else
                                                @foreach($purchase_order->fabric_codes as $fabric_code)
                                                    {{$fabric_code->fabric_code}} ,
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($purchase_order->fabric_colors) === 1)
                                                {{$purchase_order->fabric_colors[0]->fabric_color}}
                                            @else
                                                @foreach($purchase_order->fabric_colors as $fabric_color)
                                                    {{$fabric_color->fabric_color}} ,
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($purchase_order->fabric_types) === 1)
                                                {{$purchase_order->fabric_types[0]->fabric_type}}
                                            @else
                                                @foreach($purchase_order->fabric_types as $fabric_type)
                                                    {{$fabric_type->fabric_type}} ,
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($purchase_order->placements) === 1)
                                                {{$purchase_order->placements[0]->placement}}
                                            @else
                                                @foreach($purchase_order->placements as $placement)
                                                    {{$placement->placement}} ,
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a style="text-decoration: none;color:darkorange;" href="{{route('purchase-orders.edit', $purchase_order->id)}}" >
                                                <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>

                                            <form style="display:inline;" action="{{route('purchase-orders.destroy', $purchase_order->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border: none;background-color: white;color:darkred;"
                                                        onclick="return confirm('Delete PO#{{$purchase_order->purchase_order}}  ?')" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h3 class="text-danger">No Purchase Order Available!</h3>
                                @endforelse

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
    </div>
@endsection
