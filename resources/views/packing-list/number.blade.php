@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="card mb-3 print-hide">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing List View</h5>

                        <div>

                            <select name="pl_version" id="pl_version" class="btn btn-outline-info">
                                <option value="0" selected disabled>Select Version</option>
                                <option value="1" >Style</option>
                                <option value="2" >Material</option>
                                <option value="3" >Mat+BuyM+BuyY</option>
                                <option value="4" >Destination</option>
                                <option value="5" >Lock</option>
                            </select>

                            @can('create', App\Models\PackingList::class)
                            <button id="addPOModalBtn" type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#addPOModal">
                                Add PO
                            </button>
                             @endcan
                            <a href="{{route('packing-lists.exportnumber', [$packinglists[0]['pl_batch']
                                                                        ,$packinglists[0]['pl_number_batch']])}}"
                               class="btn btn-outline-success">
                                Excel</a>
                            <a href="#" id="pl_print"
                               class="btn btn-outline-primary">
                                Print</a>


                            <a href="{{route('packing-lists.batch', $packinglists[0]['pl_batch'])}}"
                               class="btn btn-outline-secondary">
                                Back</a>

                        </div>

                    </div>

                </div>

                <div class="card pl_section-to-print">
                    <div class="card-header">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 m-0 p-0">

                                <img src="{{ asset('storage/images/horizonlogo.png') }}"
                                     width="80" height="35" alt="Horizon Outdoor" style="position: absolute;">

                                <div class="row m-0 p-0">
                                    <h6 for="" class="col-md-4 text-md-end"> Status:</h6>

                                    <select id="pl_status" class="col-md-7 text-start" style="
                                    {{$packinglists[0]['pl_status']=="Drafted" ? 'background-color:yellow;' : ''}}
                                    {{$packinglists[0]['pl_status']=="Canceled" ? 'background-color:red;' : ''}}
                                    {{$packinglists[0]['pl_status']=="Final" ? 'background-color:green;color:white;' : ''}}
                                        font-size: 1rem;
                                        border:none;"
                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot
                                    >
                                        <option value="Draft"
                                            {{ $packinglists[0]['pl_status']=="Draft" ? 'selected' : ''  }}
                                        >Draft</option>
                                        <option value="Cancelled"
                                            {{ $packinglists[0]['pl_status']=="Cancelled" ? 'selected' : ''  }}
                                        >Cancelled</option>
                                        <option value="Final"
                                            {{ $packinglists[0]['pl_status']=="Final" ? 'selected' : ''  }}
                                        >Final</option>

                                    </select>

                                </div>

                                <div class="row">

                                    <h6  class="col-md-4 text-md-end"> MD:</h6>

                                    <p class="col-md-7 text-start m-0" style="font-size: 1rem;">
                                        {{\App\Models\User::where('id',$packinglists[0]['user_id'])->first()->name}}
                                    </p>

                                </div>

                                <div class="row">

                                    <h6  class="col-md-4 text-md-end"> Print Date:</h6>

                                    <p class="col-md-7 text-start m-0" style="font-size: 1rem;">
                                        {{now()->format('Y-m-d H:i')}}
                                    </p>

                                </div>

                                <div class="row">
                                    <h6 for="" class="col-md-4 text-md-end"> CRD:</h6>

                                    <input id="pl_crd_input" class="col-md-7 text-start"
                                           type="date"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 15px;padding-left: 0.7em;
                                                    " value="{{$packinglists[0]['pl_crd']}}"
                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot
                                    >




                                </div>
                                <div class="row">
                                    <h6  class="col-md-4 text-md-end"> Customer Name:</h6>


                                    <input id="pl_country_input" class="col-md-7 text-start"
                                           type="text"
                                           style="text-align: center;
                               border: 0; background-color:	 #f1f1f1;
                               font-weight: 500;font-size: 1.2rem;
                               padding:0;line-height: 10px;padding-left: 0.7em;"
                                           value="{{$packinglists[0]['pl_country']}}"
                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot >

                                    <h6  class="col-md-4 text-md-end"></h6>
                                    <input id="pl_country_two_input" class="col-md-7 text-start"
                                           type="text"
                                           style="text-align: center;
                           border: 0; background-color:	 #f1f1f1;
                           font-weight: 500;font-size: 1.2rem;
                           padding:0;line-height: 10px;padding-left: 0.7em;"
                                           value="{{$packinglists[0]['pl_country_two']}}"
                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot >

                                </div>
                                <div class="row">
                                    <h6  class="col-md-4 text-md-end"> Destination Country:</h6>

                                    <input id="pl_destination_input" class="col-md-7 text-start"
                                           type="text"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;padding-left: 0.7em;
                                                    " value="{{$packinglists[0]['pl_destination']}}"
                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot>

                                </div>



                            </div>

                            <div class="col-md-2 m-0 p-0">
                                <h4 class="text-center mt-3" >PACKING LIST</h4>
                                <input id="pl_factory_po_input" type="text" class="form-control"
                                       style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_factory_po']}}"
                                @cannot('create', App\Models\PackingList::class)
                                    {{'disabled'}}
                                    @endcannot
                                >
                                <input disabled id="pl_shipment_input" type="text" class="form-control"
                                       style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_shipment_mode']}}">

                                <textarea rows="2" id="pl_rm_input" style="min-width: 100%"
                                       @cannot('create', App\Models\PackingList::class)
                                           {{'disabled'}}
                                           @endcannot
                                        >Remarks:
                                                                {{$packinglists[0]['pl_remarks']}}
                                </textarea>

                            </div>

                            <div class="col-md-6 mt-4" style="padding-left: 20px;">
                                <table class="table table-bordered m-0" style="table-layout: fixed;">

                                    <tbody>
                                    <tr>
                                        <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">Line Supervisor</th>
                                        <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">QC</th>
{{--                                        <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">QC</th>--}}
                                        <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">CFA</th>
                                        <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">Warehouse</th>
                                        <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">Shipping</th>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;">Date:</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;">Date:</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;">Date:</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;">Date:</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;">Date:</td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px; height: 80px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;height: 60px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;height: 60px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;height: 60px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                        <td style="padding: 0px;margin: 0px; font-size: 12px;height: 60px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
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
            <div class="row section-pl-to-no-print">
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
                                        <th width="7%" scope="col">Master PO</th>
                                        <th width="7%" scope="col">PO</th>
                                        <th width="6%" scope="col">Style</th>
                                        <th width="7%" scope="col">Material</th>
                                        <th width="17%" scope="col">Description</th>
                                        <th width="12%" scope="col">Color</th>

                                        @if($packinglists[0]['pl_type']  == 'APPAREL')
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

{{--                                                here change--}}

                                                @if($packinglist['pl_version'] == 1)
                                                     <input type="hidden" value="{{ltrim(substr($packinglist['pl_sku'],-5),0)}}">
                                                @elseif($packinglist['pl_version'] == 2)
                                                    <input type="hidden" value="{{ltrim($packinglist['pl_material'])}}">
                                                @elseif($packinglist['pl_version'] == 3)
                                                    <input type="hidden" value="{{ltrim(substr($packinglist['pl_sku'],-5),0) .
                                                    $packinglist['pl_buy_year'] . $packinglist['pl_buy_month'] }}">
                                                @elseif($packinglist['pl_version'] == 4)
                                                    <input type="hidden" value="{{ltrim(substr($packinglist['pl_material'],-8),0) .
                                                    $packinglist['pl_buy_year'] . $packinglist['pl_buy_month'] . "DEST" }}">
                                                @elseif($packinglist['pl_version'] == 5)
                                                    <input type="hidden" value="{{ltrim(substr($packinglist['pl_material'],-8),0) .
                                                    $packinglist['pl_buy_year'] . $packinglist['pl_buy_month'] . $packinglist['pl_po_cut'] }}">
                                                @endif


                                                <input type="hidden" value="{{$packinglist['pl_style_size']}}">

                                                <input type="hidden" value="{{$packinglist['pl_style_id']}}">

                                                <td scope="col">{{$packinglist['pl_master_po']}}</td>
                                                <td scope="col">{{$packinglist['pl_po_cut']}}</td>

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

