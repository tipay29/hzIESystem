@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="card mb-3 print-hide">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing List View</h5>

                        <div>
                            <button id="addPOModalBtn" type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#addPOModal">
                                Add PO
                            </button>
                            <a href="#" id="pl_print_all"
                               class="btn btn-outline-primary">
                                Print</a>


                            <a href="{{route('packing-lists.batch', $packinglists[0]['pl_batch'])}}"
                               class="btn btn-outline-secondary">
                                Back</a>

                        </div>

                    </div>

                </div>


                <div class="card mb-3 pl_section-to-print">

                    @include('packing-list.numberheader')

                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{route('packing-lists.number', [$packinglists[0]['pl_batch']
                                                                        ,$packinglists[0]['pl_number_batch']])}}"
                              method="get">
                            <div class="row mb-1 section-pl-to-no-print">
                                <div class="col-md-2">
                                    <select name="pln_po_cut[]" id="pln_po_cut" multiple class="chosen-select form-control"
                                            data-placeholder="Select PO">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="pln_master_po[]" id="pln_master_po" multiple class="chosen-select form-control"
                                            data-placeholder="Select Master PO">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="pln_material[]" id="pln_material" multiple class="chosen-select form-control"
                                            data-placeholder="Select Material">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="pln_description[]" id="pln_description" multiple class="chosen-select form-control"
                                            data-placeholder="Select Description">

                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select name="pln_color[]" id="pln_color" multiple class="chosen-select form-control"
                                            data-placeholder="Select Color">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="pln_carton[]" id="pln_carton" multiple class="chosen-select form-control"
                                            data-placeholder="Select Carton">

                                    </select>
                                </div>
                                <input id="pln_value_ctn" type="hidden" value="{{$cartons}}">

                            </div>
            <div class="row">
                <div class="col-md-6">
                    <button id="pln_clear" style="height: 100%;" class="btn form-control btn-primary">
                        Clear</button>
                </div>
                <div class="col-md-6">
                    <button id="pln_filter" style="height: 100%;" class="btn form-control btn-primary">
                        Filter</button>
                </div>
            </div>



                        </form>
                        <div class="table-responsive">
                                <table id="table" class="table pl_table_number" >
                                <thead>
                                    <tr>
                                        <th width="7%" scope="col">PO</th>
                                        <th width="7%" scope="col">Master PO</th>
                                        <th width="6%" scope="col">Style</th>
                                        <th width="7%" scope="col">Material</th>
                                        <th width="21%" scope="col">Description</th>
                                        <th width="8%" scope="col">Color</th>

                                        @if($packinglists[0]['pl_type']  == 'APPAREL')
                                        <th width="2%" scope="col">Size</th>
                                        @endif
                                        <th class="text-end" width="3%" scope="col">TtlQty</th>
                                        <th class="text-end" width="3%" scope="col">Qty/Ctn</th>
                                        <th class="text-end" width="8%" scope="col">CtnNum</th>
                                        <th class="text-end" width="5%" scope="col">CtnTtl</th>
                                        <th class="text-end" width="3%" scope="col">NW</th>
                                        <th class="text-end" width="3%" scope="col">TNW</th>
                                        <th class="text-end" width="3%" scope="col">GW</th>
                                        <th class="text-end" width="3%" scope="col">TGW</th>
                                        <th class="text-end" width="10%" scope="col">Ctn Measurement</th>
                                        <th class="text-end" width="3%" scope="col">CBM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display: none;"> {{$number_ctn = 0}}</div>
                                    @foreach($packinglists as $key => $packinglist)
                                        @if($key == count($packinglists)-1)
                                              <tr >
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                  @if($packinglists[0]['pl_type']  == 'APPAREL')
                                                <td scope="col"></td>
                                                  @endif
                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglist['total_qty_ship'])}} </b> </td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglist['total_carton'])}} </b></td>
                                                <td scope="col"></td>
                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglist['total_nw'], 2, '.', ',')}} </b></td>
                                                <td scope="col"></td>
                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglist['total_gw'], 2, '.', ',')}} </b></td>
                                                <td scope="col"></td>
                                                <td align="right" scope="col"> <b> {{number_format((float)$packinglist['total_cbm'], 2, '.', ',')}} </b> </td>
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


                                                <td scope="col">{{$packinglist['pl_po_cut']}}</td>
                                                <td scope="col">{{$packinglist['pl_master_po']}}</td>
                                                <td scope="col">{{$packinglist['pl_sku']}}</td>
                                                <td scope="col">{{$packinglist['pl_material']}}</td>
                                                <td scope="col">{{$packinglist['pl_description']}}</td>
                                                <td scope="col">{{$packinglist['pl_color']}} </td>
                                                @if($packinglist['pl_type']  == 'APPAREL')
                                                <td scope="col">{{$packinglist['pl_style_size']}} </td>
                                                @endif
                                                <td align="right" scope="col">{{number_format((float)$packinglist['pl_order_quantity_cut'])}}</td>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['pl_one_ctn_item_count'])}}</td>

                                                <td align="right" scope="col">{{number_format((float)$number_ctn+1) . "-" . number_format(($number_ctn+ intval($packinglist['pl_number_of_carton'])))}}</td>

                                                <div style="display: none;">
                                                {{$number_ctn = $number_ctn + intval($packinglist['pl_number_of_carton'])}}
                                                </div>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['pl_number_of_carton'])}}</td>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['net_weight_one_ctn'], 2, '.', ',')}}</td>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['net_weight_total'], 2, '.', ',')}}</td>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['gross_weight_one_ctn'], 2, '.', ',')}}</td>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['gross_weight_total'], 2, '.', ',')}}</td>
                                                <td align="right" scope="col">{{$packinglist['carton_size']}}CM</td>
                                                <td align="right" scope="col">{{number_format((float)$packinglist['cbm'], 2, '.', ',')}}</td>
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

