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

                            <a href="#" id="pl_print_all"
                               class="btn btn-outline-primary">
                                Print</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>



                        </div>

                    </div>

                </div>


                       @for($x = 0;$x < count($packinglists);$x++)

                            <div class="card mb-3 pl_section-to-print">

                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-md-4">

                                            <img src="{{ asset('storage/images/horizonlogo.png') }}" width="85" height="40" alt="Horizon Outdoor">
                                            <small> <b> Horizon Outdoor Cambodia Co. LTD </b> </small> <br>
                                            <p class="m-0" style="font-size: .8rem; ">
                                                National Highway 5, 43km Phum Phsar Trach, Khum Longvek,</p>
                                            <p class="m-0" style="font-size: .8rem; ">
                                                Srok Kampong Tralach, Kampong Chhnang Province, Cambodia</p>

                                        </div>

                                        <div class="col-md-4" >

                                            <h4 class="text-center">PACKING LIST</h4>
                                            <input type="text" class="form-control"
                                                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_season']}}">
                                            <input type="text" class="form-control"
                                                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_shipment_mode']}}">
                                            <input type="text" class="form-control"
                                                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_factory_po']}}">
                                        </div>

                                        <div class="col-md-4" style="" >

                                            <p class="text-end m-0" style="font-size: 1rem;">
                                                Status: {{$packinglists[$x][0]['pl_crd']}}
                                            </p>
                                            <p class="text-end m-0" style="font-size: 1rem;">
                                                To: {{$packinglists[$x][0]['pl_country']}}
                                            </p>
                                            <p class="text-end m-0" style="font-size: 1rem;">
                                                Origin: Cambodia
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th width="7%" scope="col">PO</th>
                                                <th width="7%" scope="col">Master PO</th>
                                                <th width="6%" scope="col">Style</th>
                                                <th width="9%" scope="col">Material</th>
                                                <th width="18%" scope="col">Description</th>
                                                <th width="8%" scope="col">Color</th>
                                                <th width="2%" scope="col">Size</th>
                                                <th width="3%" scope="col">TtlQty</th>
                                                <th width="3%" scope="col">Qty/Ctn</th>
                                                <th width="4%" scope="col">CtnNum</th>
                                                <th width="5%" scope="col">CtnTotal</th>
                                                <th width="3%" scope="col">NW</th>
                                                <th width="3%" scope="col">NWA</th>
                                                <th width="3%" scope="col">GW</th>
                                                <th width="3%" scope="col">GWA</th>
                                                <th width="13%" scope="col">Carton Measurement</th>
                                                <th width="4%" scope="col">CBM</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                    @for($y = 0; $y < count($packinglists[$x]);$y++)

                                                        @if($y == count($packinglists[$x])-1)
                                                            <tr>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"> <b> {{$packinglists[$x][$y]['total_qty_ship']}}  </b></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"></td>
                                                                <td scope="col"> <b> {{$packinglists[$x][$y]['total_carton']}} </b> </td>
                                                                <td scope="col"></td>
                                                                <td scope="col"> <b> {{$packinglists[$x][$y]['total_nw']}} </b> </td>
                                                                <td scope="col"></td>
                                                                <td scope="col"> <b> {{$packinglists[$x][$y]['total_gw']}} </b> </td>
                                                                <td scope="col"></td>
                                                                <td scope="col"> <b> {{$packinglists[$x][$y]['total_cbm']}} </b> </td>
                                                            </tr>

                                                        @else
                                                            <tr>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_po_cut']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_master_po']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_sku']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_material']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_description']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_color']}} </td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_style_size']}} </td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_order_quantity_cut']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_one_ctn_item_count']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['carton_number_display']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['pl_number_of_carton']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['net_weight_one_ctn']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['net_weight_total']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['gross_weight_one_ctn']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['gross_weight_total']}}</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['carton_size']}}CM</td>
                                                                <td scope="col">{{$packinglists[$x][$y]['cbm']}}</td>
                                                            </tr>

                                                        @endif
                                                    @endfor

                                            </tbody>

                                        </table>



                                    </div>


                                    <div class="row">


                                        <div style="min-height: 50px;" class="col-md-8">

                                            <img src="{{ asset('storage/images/shipmark/' . $packinglists[$x][0]['pl_brand'] .
                                    '/' . $packinglists[$x][0]['pl_type'] . '/' .$packinglists[$x][0]['pl_country'] . '.png') }}" alt="">

                                        </div>
                                        <div style="min-height: 50px;" class="col-md-4">

                                            <h5>Remarks:</h5>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="pagebreak"> </div>

                        @endfor

            </div>
        </div>
    </div>
@endsection

