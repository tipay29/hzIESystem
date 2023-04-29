@extends('layouts.app')

@section('style')
    <style>

        @page{
            size:landscape;

        }
    </style>

@endsection

@section('content')
    <div class="container-fluid ">
        <div class="row justify-content-center ">
            <div class="col-md-12 ">

                <div class="card mb-3 print-hide">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing List Batch {{$packinglists[0][0]['pl_batch']}} View All</h5>

                        <div>

                            <a href="{{route('packing-lists.exportbatch', $packinglists[0][0]['pl_batch'])}}"
                               class="btn btn-outline-success">
                                Excel</a>

                            <a href="#" id="pl_print_all"
                               class="btn btn-outline-primary">
                                Print</a>

                            <a href="{{route('packing-lists.batch', $packinglists[0][0]['pl_batch'])}}"
                               class="btn btn-outline-secondary">
                                Back</a>



                        </div>

                    </div>

                </div>


                       @for($x = 0;$x < count($packinglists);$x++)

                            <div class="card mb-3 pl_section-to-print">

                                @include('packing-list.viewaheader')

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table pl_table_number" >
                                            <thead>
                                            <tr>
                                                <th width="7%" scope="col">Master PO</th>
                                                <th width="7%" scope="col">PO</th>
                                                <th width="6%" scope="col">Style</th>
                                                <th width="7%" scope="col">Material</th>
                                                <th width="17%" scope="col">Description</th>
                                                <th width="12%" scope="col">Color</th>
                                                @if($packinglists[0][0]['pl_type']  == 'APPAREL')
                                                <th width="2%" scope="col">Size</th>
                                                @endif
                                                <th class="text-end" width="3%" scope="col">TtlQty</th>
                                                <th class="text-end" width="3%" scope="col">Qty/Ctn</th>
                                                <th class="text-end" width="8%" scope="col">CtnNo</th>
                                                <th class="text-end" width="5%" scope="col">CtnQty</th>
                                                <th class="text-end" width="3%" scope="col">NW</th>
                                                <th class="text-end" width="3%" scope="col">TNW</th>
                                                <th class="text-end" width="3%" scope="col">GW</th>
                                                <th class="text-end" width="3%" scope="col">TGW</th>
                                                <th class="text-end" width="10%" scope="col">Ctn Measurement</th>
                                                <th class="text-end" width="4%" scope="col">CBM</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            <div style="display: none;">
                                                {{$number_ctn = 0}}
                                            </div>

                                                    @for($y = 0; $y < count($packinglists[$x]);$y++)

                                                        @if($y == count($packinglists[$x])-1)
                                                            <tr>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                @if($packinglists[0][0]['pl_type']  == 'APPAREL')
                                                                <td scope="col"></td>
                                                                @endif
                                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_qty_ship'])}}  </b></td>
                                                                <td align="right" scope="col"></td>
                                                                <td align="right" scope="col"></td>
                                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_carton'])}} </b> </td>
                                                                <td align="right" scope="col"></td>
                                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_nw'], 2, '.', ',')}} </b> </td>
                                                                <td align="right" scope="col"></td>
                                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_gw'], 2, '.', ',')}} </b> </td>
                                                                <td align="right" scope="col"></td>
                                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_cbm'], 2, '.', ',')}} </b> </td>
                                                            </tr>

                                                        @else
                                                            <tr>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_master_po']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_po_cut']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_sku']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_material']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_description']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_color']}} </td>
                                                                @if($packinglists[0][0]['pl_type']  == 'APPAREL')
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_style_size']}} </td>
                                                                @endif
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['pl_order_quantity_cut'])}}</td>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['pl_one_ctn_item_count'])}}</td>
                                                                <td align="right" scope="col">{{number_format((float)$number_ctn+1) . "-" . number_format(($number_ctn+ intval($packinglists[$x][$y]['pl_number_of_carton'])))}}</td>
                                                                <div style="display: none;">
                                                                    {{$number_ctn = $number_ctn + intval($packinglists[$x][$y]['pl_number_of_carton'])}}
                                                                </div>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['pl_number_of_carton'])}}</td>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['net_weight_one_ctn'], 2, '.', ',')}}</td>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['net_weight_total'], 2, '.', ',')}}</td>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['gross_weight_one_ctn'], 2, '.', ',')}}</td>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['gross_weight_total'], 2, '.', ',')}}</td>
                                                                <td align="right" scope="col">{{$packinglists[$x][$y]['carton_size']}}CM</td>
                                                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['cbm'], 2, '.', ',')}}</td>
                                                            </tr>

                                                        @endif
                                                    @endfor

                                            </tbody>

                                        </table>



                                    </div>

                                    @include('packing-list.viewasummary')

                                    @include('packing-list.viewashipmark')

                                </div>

                            </div>

                            <div class="pagebreak"> </div>

                        @endfor

            </div>
        </div>
    </div>
@endsection

