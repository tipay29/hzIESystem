@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">

                    @include('carton-order.order-show-header')

                    <div class="card-body">

                        <table class="table table-bordered co-create-table">
                            <thead >
                            <tr class="table-active">
                                <th width="7%" class="text-center" scope="col">Fty PO#</th>
                                <th width="4%" class="text-center" scope="col">DC Code</th>
                                <th width="5%" class="text-center" scope="col">PO#</th>
                                <th width="5%" class="text-center" scope="col">Material</th>
                                <th width="15%" class="text-center" scope="col">Description</th>
                                <th width="3%" class="text-center" scope="col">Size</th>
                                <th width="5%" class="text-center" scope="col">TtlQty</th>
                                <th width="2%" class="text-center" scope="col">Qty/Ctn</th>
                                <th width="8%" class="text-center" scope="col">Ctn Specification</th>
                                <th width="10%" class="text-center" scope="col">Ctn Measurement</th>
                                <th width="5%" class="text-center" scope="col">CtnQty</th>
                                <th width="3%" class="text-center" scope="col">N.W</th>
                                <th width="3%" class="text-center" scope="col">G.W</th>
                                <th width="5%" class="text-center" scope="col">Ctn Price</th>
                                <th width="6%" class="text-center" scope="col">TTL Amount</th>
                                <th width="6%" class="text-center" scope="col">Carton Code</th>
                                <th width="6%" class="text-center" scope="col">Collection</th>
                                <th style="display: none;"  width="2%" class="text-center cbsEditCartonForm" scope="col">
                                    <button id="ctn_btn_edit_edit" class="btn btn-primary" style="padding: 0;"
                                            data-bs-toggle="modal" data-bs-target="#order_carton_edit_modal">EDIT</button>

                                </th>

                            </tr>
                            <tr class="table-active">
                                <th width="5%" class="text-center" scope="col">批号</th>
                                <th width="4%" class="text-center" scope="col">DC</th>
                                <th width="5%" class="text-center" scope="col">PO 号</th>
                                <th width="5%" class="text-center" scope="col">款号</th>
                                <th width="12%" class="text-center" scope="col">颜色全称</th>
                                <th width="3%" class="text-center" scope="col">尺码</th>
                                <th width="5%" class="text-center" scope="col">成品数量</th>

                                <th width="2%" class="text-center" scope="col" style="font-size: 11px !important;">单箱件数</th>

                                <th width="8%" class="text-center" scope="col">材质规格</th>
                                <th width="10%" class="text-center" scope="col">纸箱尺寸</th>
                                <th width="5%" class="text-center" scope="col">纸箱数量</th>
                                <th width="3%" class="text-center" scope="col">净重</th>
                                <th width="3%" class="text-center" scope="col">毛重</th>
                                <th width="5%" class="text-center" scope="col">单价</th>
                                <th width="6%" class="text-center" scope="col">金额</th>
                                <th width="7%" class="text-center" scope="col">纸箱代号</th>
                                <th width="7%" class="text-center" scope="col">纸箱代号</th>
                                <th style="display: none;" width="2%" class="text-center cbsEditCartonForm" scope="col">
                                    <input id="cbEditCartonFormAll" type="checkbox">
                                </th>

                            </tr>

                            </thead>
                            <tbody>
                            @php
                                $total_fob_all = 0;
                            @endphp
                            @foreach($carton_order->carton_order_contents as $key => $cartonorder)
                                <tr>

                                    <td class="text-center">{{$cartonorder['ctn_factory_po']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_dc_code']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_master_po']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_material']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_description']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_style_size']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_po_quantity']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_quantity_per_carton']}}</td>
                                    <td class="text-center">{{$cartonorder->carton->ctn_specification}}</td>
                                    <td class="text-center">{{$cartonorder->carton->ctn_size}}CM</td>
                                    <td class="text-center">{{$cartonorder['ctn_quantity']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_nw_one']}}</td>
                                    <td class="text-center">{{$cartonorder['ctn_gw_one']}}</td>
                                    <td class="text-center">${{$cartonorder->carton->ctn_fob}}</td>
                                    <td class="text-center">${{$cartonorder->carton->ctn_fob*$cartonorder['ctn_quantity']}} </td>
                                    <div style="display: none;">
                                        {{$total_fob_all = $total_fob_all + $cartonorder->carton->ctn_fob*$cartonorder['ctn_quantity']}}
                                    </div>
                                    <td class="text-center">{{$cartonorder->carton->ctb_code_1001 . $cartonorder->carton->ctb_code_1004}}</td>
                                    <td class="text-center"></td>
                                    <td style="display: none;"  class="cbsEditCartonForm">
                                        &nbsp;&nbsp;&nbsp;
                                        <input class="cf_details"  type="checkbox" name="cf_details[]" value="{{$cartonorder->id}}">
                                    </td>

                                </tr>
                            @endforeach
                            <tr class="table-active">
                                <td colspan="10" class="text-center"> <b> Grand Total </b></td>
                                <td class="text-center"> <b>  {{$carton_order->carton_order_contents->sum('ctn_quantity')}} </b></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"> <b> $ {{$total_fob_all}}</b> </td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td style="display: none;" class="text-center cbsEditCartonForm"><button class="btn btn-secondary" id="ctn_btn_edit_hide" style="padding: 0;">HIDE</button></td>

                            </tr>
                            </tbody>
                        </table>

                        @include('carton-order.order-show-summary')
                        @include('carton-order.order-show-bottom')
                        @include('carton-order.order-edit-modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

