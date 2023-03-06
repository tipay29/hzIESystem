@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">





                <div class="card mb-3">

                    @include('packing-list.numberheader')

                    <div class="card-body">

                        <div class="table-responsive">
                                <table class="table" >
                                <thead>
                                    <tr>
                                        <th width="2%" scope="col">key</th>
                                        <th width="7%" scope="col">PO</th>
                                        <th width="7%" scope="col">Master PO</th>
                                        <th width="6%" scope="col">Style</th>
                                        <th width="9%" scope="col">Material</th>
                                        <th width="16%" scope="col">Description</th>
                                        <th width="8%" scope="col">Color</th>
                                        <th width="2%" scope="col">Size</th>
                                        <th width="3%" scope="col">TtlQty</th>
                                        <th width="3%" scope="col">Qty/Ctn</th>
                                        <th width="4%" scope="col">CtnNum</th>
                                        <th width="5%" scope="col">CtnTtl</th>
                                        <th width="3%" scope="col">NW</th>
                                        <th width="3%" scope="col">TNW</th>
                                        <th width="3%" scope="col">GW</th>
                                        <th width="3%" scope="col">TGW</th>
                                        <th width="13%" scope="col">Carton Measurement</th>
                                        <th width="3%" scope="col">CBM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{$number_ctn = 0}}
                                    @foreach($packinglists as $key => $packinglist)
                                        @if($key == count($packinglists)-1)
                                              <tr >
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"> <b> {{$packinglist['total_qty_ship']}} </b> </td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"> <b> {{$packinglist['total_carton']}} </b></td>
                                                <td scope="col"></td>
                                                <td scope="col"> <b> {{number_format((float)$packinglist['total_nw'], 2, '.', '')}} </b></td>
                                                <td scope="col"></td>
                                                <td scope="col"> <b> {{number_format((float)$packinglist['total_gw'], 2, '.', '')}} </b></td>
                                                <td scope="col"></td>
                                                <td scope="col"> <b> {{$packinglist['total_cbm']}} </b> </td>
                                            </tr>
                                        @else
                                            <tr id="ClickableRow">
                                                <input type="hidden" value="{{$packinglist['id']}}">
                                                <input type="hidden" value="{{$packinglist['row_cut']}}">
                                                <input type="hidden" value="{{$packinglist['pl_order_quantity']}}">
                                                <input type="hidden" value="{{$packinglist['net_weight_one_ctn']}}">
                                                <input type="hidden" value="{{$packinglist['gross_weight_one_ctn']}}">
                                                <input type="hidden" value="{{ltrim(substr($packinglist['pl_sku'],-5),0)}}">
                                                <input type="hidden" value="{{$packinglist['pl_style_size']}}">
                                                <input type="hidden" value="{{$packinglist['pl_style_id']}}">

                                                <td scope="col">{{$packinglist['id']}}</td>
                                                <td scope="col">{{$packinglist['pl_po_cut']}}</td>
                                                <td scope="col">{{$packinglist['pl_master_po']}}</td>
                                                <td scope="col">{{$packinglist['pl_sku']}}</td>
                                                <td scope="col">{{$packinglist['pl_material']}}</td>
                                                <td scope="col">{{$packinglist['pl_description']}}</td>
                                                <td scope="col">{{$packinglist['pl_color']}} </td>
                                                <td scope="col">{{$packinglist['pl_style_size']}} </td>
                                                <td scope="col">{{$packinglist['pl_order_quantity_cut']}}</td>
                                                <td scope="col">{{$packinglist['pl_one_ctn_item_count']}}</td>
                                                <td scope="col">{{$number_ctn+1 . "-" . ($number_ctn+ intval($packinglist['pl_number_of_carton']))}}</td>
                                                {{$number_ctn = $number_ctn + intval($packinglist['pl_number_of_carton'])}}
                                                <td scope="col">{{$packinglist['pl_number_of_carton']}}</td>
                                                <td scope="col">{{number_format((float)$packinglist['net_weight_one_ctn'], 2, '.', '')}}</td>
                                                <td scope="col">{{number_format((float)$packinglist['net_weight_total'], 2, '.', '')}}</td>
                                                <td scope="col">{{number_format((float)$packinglist['gross_weight_one_ctn'], 2, '.', '')}}</td>
                                                <td scope="col">{{number_format((float)$packinglist['gross_weight_total'], 2, '.', '')}}</td>
                                                <td scope="col">{{$packinglist['carton_size']}}CM</td>
                                                <td scope="col">{{$packinglist['cbm']}}</td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>

                            </table>


                        </div>

{{--                        SUMMARY SIZE FOR APPAREL--}}

                        @include('packing-list.numbersummary')


                        @include('packing-list.numbershipmark')


                    </div>





{{--                        MODAL--}}
                        @include('packing-list.addpo')
                        @include('packing-list.addmcq')





            </div>
        </div>
    </div>
@endsection

