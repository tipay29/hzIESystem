@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card section-to-print">

                    @include('carton.order-create-header')

                    <div class="card-body">

                        <input id="ctn_content" type="hidden" value="{{$cartonorders}}">

                        <table class="table table-bordered co-create-table">
                            <thead >
                                <tr class="table-active">
                                    <th width="5%" class="text-center" scope="col">Fty PO#</th>
                                    <th width="4%" class="text-center" scope="col">DC Code</th>
                                    <th width="8%" class="text-center" scope="col">Customer Name</th>
                                    <th width="7%" class="text-center" scope="col">Destination</th>
                                    <th width="5%" class="text-center" scope="col">PO#</th>
                                    <th width="5%" class="text-center" scope="col">Material</th>
                                    <th width="15%" class="text-center" scope="col">Description</th>
                                    <th width="3%" class="text-center" scope="col">Size</th>
                                    <th width="5%" class="text-center" scope="col">TtlQty</th>
                                    <th width="3%" class="text-center" scope="col">Qty/Ctn</th>
                                    <th width="3%" class="text-center" scope="col">Ctn Specification</th>
                                    <th width="7%" class="text-center" scope="col">Ctn Measurement</th>
                                    <th width="5%" class="text-center" scope="col">CtnQty</th>
                                    <th width="4%" class="text-center" scope="col">N.W</th>
                                    <th width="4%" class="text-center" scope="col">G.W</th>
                                    <th width="4%" class="text-center" scope="col">Ctn Price</th>
                                    <th width="5%" class="text-center" scope="col">TTL Amount</th>
                                    <th width="4%" class="text-center" scope="col">Carton Code</th>
                                    <th width="4%" class="text-center" scope="col">Collection</th>
                                 </tr>
                                <tr class="table-active">
                                    <th class="text-center" scope="col">批号</th>
                                    <th class="text-center" scope="col">DC</th>
                                    <th class="text-center" scope="col">客人名称</th>
                                    <th class="text-center" scope="col">គ目的地</th>
                                    <th class="text-center" scope="col">PO 号</th>
                                    <th class="text-center" scope="col">款号</th>
                                    <th  class="text-center" scope="col">颜色全称</th>
                                    <th class="text-center" scope="col">尺码</th>
                                    <th class="text-center" scope="col">成品数量</th>

                                    <th class="text-center" scope="col" style="font-size: 11px !important;">单箱件数</th>

                                    <th class="text-center" scope="col">材质规格</th>
                                    <th  class="text-center" scope="col">纸箱尺寸</th>
                                    <th class="text-center" scope="col">纸箱数量</th>
                                    <th class="text-center" scope="col">净重</th>
                                    <th class="text-center" scope="col">毛重</th>
                                    <th class="text-center" scope="col">单价</th>
                                    <th class="text-center" scope="col">金额</th>
                                    <th class="text-center" scope="col">纸箱代号</th>
                                    <th class="text-center" scope="col">纸箱代号</th>
                                 </tr>

                            </thead>
                            <tbody>
                                @foreach($cartonorders as $key => $cartonorder)
                                        <tr>

                                            <td class="text-center">{{$cartonorder['ctn_factory_po']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_dc_code']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_customer_name']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_destination']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_master_po']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_material']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_desc']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_style_size']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_pl_quantity']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_mcq']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_specification']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_carton']}}CM</td>
                                            <td class="text-center">{{$cartonorder['ctn_quantity']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_nw']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_gw']}}</td>
                                            <td class="text-center">${{$cartonorder['ctn_fob']}}</td>
                                            <td class="text-center">${{$cartonorder['ctn_fob_all']}} </td>
                                            <td class="text-center">{{$cartonorder['ctn_code']}}</td>
                                            <td class="text-center"></td>


                                        </tr>
                                @endforeach
                                <tr class="table-active">
                                    <td colspan="12" class="text-center"> <b> Grand Total </b></td>
                                    <td class="text-center"> <b>  {{$cartonorders->sum('ctn_quantity')}} </b></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"> <b> ${{$cartonorders->sum('ctn_fob_all')}} </b> </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                 </tr>
                            </tbody>
                        </table>

                        @include('carton.order-create-summary')
                        @include('carton.order-create-bottom')


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

