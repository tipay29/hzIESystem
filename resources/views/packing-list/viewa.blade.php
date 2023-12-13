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

                            <a href="{{route('packing-lists.ctnform', $packinglists[0][0]['pl_batch'])}}"
                               class="btn btn-outline-success">
                                Carton Form</a>

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
                    <div class="card pl_section-to-print">
                        <div class="card-header">
                            <div class="row m-0 p-0">
                                <div class="col-md-4 m-0 p-0">
                                    <img src="{{ asset('storage/images/horizonlogo.png') }}" width="80" height="35" alt="Horizon Outdoor"
                                         style="position: absolute;">

                                    <div class="row">
                                        <h6 for="" class="col-md-4 text-md-end"> Status:</h6>

                                        <select disabled id="pl_status" class="col-md-7 text-start" style="
                                        {{$packinglists[$x][0]['pl_status']=="Drafted" ? 'background-color:yellow;' : ''}}
                                        {{$packinglists[$x][0]['pl_status']=="Canceled" ? 'background-color:red;' : ''}}
                                        {{$packinglists[$x][0]['pl_status']=="Final" ? 'background-color:green;color:white;' : ''}}
                                            font-size: 1rem;
                                            border:none;"
                                        @cannot('create', App\Models\PackingList::class)
                                            {{'disabled'}}
                                            @endcannot>
                                            <option value="Draft"
                                                {{ $packinglists[$x][0]['pl_status']=="Draft" ? 'selected' : ''  }}
                                            >Draft</option>
                                            <option value="Cancelled"
                                                {{ $packinglists[$x][0]['pl_status']=="Cancelled" ? 'selected' : ''  }}
                                            >Cancelled</option>
                                            <option value="Final"
                                                {{ $packinglists[$x][0]['pl_status']=="Final" ? 'selected' : ''  }}
                                            >Final</option>

                                        </select>

                                    </div>

                                    <div class="row">
                                        <h6  class="col-md-4 text-md-end"> MD:</h6>

                                        <p class="col-md-7 text-start m-0" style="font-size: 1rem;">
                                            {{\App\Models\User::where('id',$packinglists[$x][0]['user_id'])->first()->name}}
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

                                        <p class="col-md-7 text-start m-0" style="font-size: 1rem;">
                                            {{$packinglists[$x][0]['pl_crd']}}
                                        </p>

                                    </div>
                                    <div class="row">
                                        <h6  class="col-md-4 text-md-end"> Customer Name:</h6>

                                        <p class="col-md-7 text-start m-0" style="font-size: 1rem;">
                                            {{$packinglists[$x][0]['pl_country'] . " " . $packinglists[$x][0]['pl_country_two']}}
                                        </p>

                                    </div>
                                    <div class="row">
                                        <h6  class="col-md-4 text-md-end"> Destination Country:</h6>

                                        <input id="pl_destination_input" class="col-md-7 text-start"
                                               type="text"
                                               style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;padding-left: 0.7em;
                                                    " value="{{$packinglists[$x][0]['pl_destination']}}"
                                        @cannot('create', App\Models\PackingList::class)
                                            {{'disabled'}}
                                            @endcannot>

                                    </div>



                                </div>
                                <div class="col-md-2 m-0 p-0">
                                    <h4 class="text-center mt-3">PACKING LIST</h4>
                                    <input type="text" class="form-control"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_factory_po']}}"
                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot>
                                    <input type="text" class="form-control"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_shipment_mode']}}"

                                    @cannot('create', App\Models\PackingList::class)
                                        {{'disabled'}}
                                        @endcannot>

                                    <textarea rows="2" id="pl_rm_input" style="min-width: 100%"
                                                @cannot('create', App\Models\PackingList::class)
                                               {{'disabled'}}
                                               @endcannot
                                    >Remarks:
                                    {{$packinglists[$x][0]['pl_remarks']}}
                                    </textarea>
                                </div>
                                <div class="col-md-6 m-0 mt-4" style="padding-left: 20px;">
                                    <table class="table table-bordered m-0" style="table-layout: fixed;">



                                        <tbody>
                                        <tr>
                                            <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col" >Line Supervisor</th>
                                            <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col" >QC</th>
{{--                                            <th class="text-center" width="20%" style="padding: 0px;margin: 0px;" scope="col">QC</th>--}}
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
                                            <td style="padding: 0px;margin: 0px; font-size: 12px;height: 80px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                            <td style="padding: 0px;margin: 0px; font-size: 12px;height: 80px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                            <td style="padding: 0px;margin: 0px; font-size: 12px;height: 80px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                            <td style="padding: 0px;margin: 0px; font-size: 12px;height: 80px;
                                    vertical-align:bottom;text-align:center;">Name</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                                @if($packinglists[$x][$y]['pl_version'] == 1)
                                                                    <input type="hidden" value="{{ltrim(substr($packinglists[$x][$y]['pl_sku'],-5),0)}}">
                                                                @elseif($packinglists[$x][$y]['pl_version'] == 2)
                                                                    <input type="hidden" value="{{ltrim($packinglists[$x][$y]['pl_material'])}}">
                                                                @elseif($packinglists[$x][$y]['pl_version'] == 3)
                                                                    <input type="hidden" value="{{ltrim(substr($packinglists[$x][$y]['pl_material'],-8),0) .
                                                                    $packinglists[$x][$y]['pl_buy_year'] . $packinglists[$x][$y]['pl_buy_month'] }}">
                                                                @elseif($packinglists[$x][$y]['pl_version'] == 4)
                                                                    <input type="hidden" value="{{ltrim(substr($packinglists[$x][$y]['pl_material'],-8),0) .
                                                                    $packinglists[$x][$y]['pl_buy_year'] . $packinglists[$x][$y]['pl_buy_month'] . "DEST" }}">
                                                                @elseif($packinglists[$x][$y]['pl_version'] == 5)
                                                                    <input type="hidden" value="{{ltrim(substr($packinglists[$x][$y]['pl_material'],-8),0) .
                                                                    $packinglists[$x][$y]['pl_buy_year'] . $packinglists[$x][$y]['pl_buy_month'] . $packinglists[$x][$y]['pl_po_cut'] }}">
                                                                @endif

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

