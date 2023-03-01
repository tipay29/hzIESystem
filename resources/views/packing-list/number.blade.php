@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">


            <button style="display: none;" id="addMcqModalBtn" type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addMcqModal">
                Add MCQ
            </button>


                <div class="card mb-3">

                    <div class="card-header ">
                         <div class="row">
                               <div class="col-md-4">

                                   <img src="{{ asset('storage/images/horizonlogo.png') }}" width="85" height="40" alt="Horizon Outdoor">
                                    <small> <b> Horizon Outdoor Cambodia Co. LTD </b> </small> <br>
                                    <p class="m-0" style="font-size: .8rem; ">
                                        National Highway 5, 43km Phum Phsar Trach, Khum Longvek,</p>
                                    <p class="m-0" style="font-size: .8rem; ">
                                        Srok Kampong Tralach, Kampong Chhnang Province, Cambodia</p>

                                    <p class="text-start m-0" style="font-size: 1rem;">
                                       Country Origin: Cambodia
                                    </p>
                               </div>

                                <div class="col-md-4" >
{{--                                {{dd($packinglists[0])}}--}}
                                        <h4 class="text-center">PACKING LIST</h4>
                                    <input type="text" class="form-control"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_season']}}">
                                    <input type="text" class="form-control"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_shipment_mode']}}">
                                    <input type="text" class="form-control"
                                           style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_factory_po']}}">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Carton</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($packinglists[count($packinglists)-1]['total_ctn_ctn'] as $key => $ctn)
                                                    <tr>
                                                        <td>{{$key}} </td>
                                                        <td>{{$ctn}}</td>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="pl_mcq_weight_input" class="col-md-4 text-md-end">Special Pack</label>
                                        <div class="col-md-6 ">
                                            <input
                                                style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                                                id="pl_special_pack" type="text" class="form-control" value="{{$packinglists[0]['pl_special_packs']}}"
                                                   >
                                        </div>
                                    </div>


                                    <input id="ctn_brand" type="hidden" value="{{$packinglists[0]['pl_brand']}}">
                                    <input id="ctn_type" type="hidden" value="{{$packinglists[0]['pl_type']}}">

                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][0]))
                                    <input type="hidden" id="size_one" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][0]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][1]))
                                    <input type="hidden" id="size_two" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][1]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][2]))
                                    <input type="hidden" id="size_three" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][2]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][3]))
                                    <input type="hidden" id="size_four" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][3]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][4]))
                                    <input type="hidden" id="size_five" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][4]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][5]))
                                    <input type="hidden" id="size_six" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][5]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][6]))
                                    <input type="hidden" id="size_seven" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][6]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][7]))
                                    <input type="hidden" id="size_eight" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][7]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][8]))
                                    <input type="hidden" id="size_nine" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][8]}}">
                                    @endif
                                    @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][9]))
                                    <input type="hidden" id="size_ten" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][9]}}">
                                    @endif

                                </div>

                                <div class="col-md-4" style="" >

                                    <p class="text-end m-0" style="font-size: 1rem;">
                                        Status: {{$packinglists[0]['pl_status']}}
                                    </p>
                                    <p class="text-end m-0" style="font-size: 1rem;">
                                        CRD: {{$packinglists[0]['pl_crd']}}
                                    </p>
                                    <p class="text-end m-0" style="font-size: 1rem;">
                                       Customer Name: {{$packinglists[0]['pl_country']}}
                                    </p>
                                    <p class="text-end m-0" style="font-size: 1rem;">
                                        Destination Country: <input id="pl_destination_input"
                                                                    type="text"
                                                                    style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_destination']}}">

                                    </p>


                                </div>
                         </div>
                    </div>

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
                                        <th width="3%" scope="col">NWA</th>
                                        <th width="3%" scope="col">GW</th>
                                        <th width="3%" scope="col">GWA</th>
                                        <th width="13%" scope="col">Carton Measurement</th>
                                        <th width="3%" scope="col">CBM</th>
                                    </tr>
                                </thead>
                                <tbody>

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
                                                <td scope="col">{{$packinglist['carton_number_display']}}</td>
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

                        <div class="row">

{{--                                {{dd($packinglists[0])}}--}}
                            <div style="min-height: 50px;" class="col-md-8">

                                <img width="500" height="350" src="{{ asset('storage/images/shipmark/' . $packinglists[0]['pl_brand'] .
                                    '/' . $packinglists[0]['pl_type']  . '/' .$packinglists[0]['pl_country'] . '.png') }}" alt="">

                                <form action="{{route('packing-lists.mark')}}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="country" value="{{$packinglists[0]['pl_country']}}">
                                    <input type="hidden" name="brand" value="{{$packinglists[0]['pl_brand']}}">
                                    <input type="hidden" name="type" value="{{$packinglists[0]['pl_type']}}">
                                    Select PNG to upload:
                                    <input type="file" name="file" >
                                    <input type="submit" name="submit">

                                </form>

                            </div>

                            <div style="min-height: 50px;" class="col-md-4">

                                <h5>Remarks:</h5>

                                    <textarea  cols="60" rows="10" id="pl_rm_input">
                                        {{$packinglists[0]['pl_remarks']}}
                                    </textarea>

                            </div>


                        </div>


                    </div>


                    <div class="card-footer">

                            <div class="row">

                                <div style="min-height: 200px; background-color: forestgreen;padding: 10px;" class="col-md-6">

                                    @include('packing-list.editpl')

                                </div>

                                <div style="min-height: 200px; background-color: deepskyblue;padding: 10px;"  class="col-md-6">

                                    @include('packing-list.addpo')

                                </div>

                            </div>

                            <div class="row">
                                <div style="min-height: 200px; background-color: yellow;padding: 10px;" class="col-md-6">

                                    @include('packing-list.addmcq')

                                </div>

                                <div class="col-md-6">
                                    <div id="">
                                        <form action="#" method="post" enctype="multipart/form-data"
                                              class="dropzone dz-clickable mt-2" id="instant-mcq">
                                            @csrf

                                            <div>

                                                <h4 class="text-center"> Check Column Alignment</h4>

                                            </div>

                                            <div class="dz-default dz-message">

                                                <h1> DROP here or CLICK&CHOOSE your MCQ file</h1>
                                            </div>
                                            <h4 class="text-center"> check the excel extension (xlsx,xl,xls)</h4>

                                        </form>
                                    </div>

                                </div>

                            </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
@endsection

