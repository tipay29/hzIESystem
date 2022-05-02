@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Cut List</h5>

                        <div>

                                <a href="{{route('cuts.create')}}"
                                   class="btn btn-outline-success">
                                    Add Cut </a>

                            <a href="{{route('cuts.util')}}"
                               class="btn btn-outline-success">
                                Cut Util </a>
                            <a href="{{route('cuts.total-util')}}"
                               class="btn btn-outline-success">
                                Total Cut Util </a>

                        </div>

                    </div>

                    <div class="card-body">







                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">CutID</th>
                                        <th width="5%" scope="col">Cut#</th>
                                        <th width="10%" scope="col">Style</th>
                                        <th width="15%" scope="col">Purchase Order</th>
                                        <th width="5%" scope="col">Building</th>
                                        <th width="5%" scope="col">Table</th>
                                        <th width="18%" scope="col">Spread DateTime</th>
                                        <th width="18%" scope="col">Cut DateTime</th>
                                        <th width="15%" scope="col">User</th>
                                        <th width="4%" scope="col">Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($cuts as $cut)
                                    <tr>
                                        <td  scope="row">
                                            <a href="{{route('cuts.show', $cut->id)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                {{$cut->id}} </a>
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
