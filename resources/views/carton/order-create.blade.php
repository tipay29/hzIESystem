@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">

                    @include('carton.order-create-header')

                    <div class="card-body">

                        <table class="table table-bordered co-create-table">
                            <thead style="background-color: #d1d2d4">
                                <tr>
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
                                    <th width="5%"  class="text-center" scope="col">Remark</th>
                                    <th width="6%" class="text-center" scope="col">Carton Code</th>
                                    <th width="6%" class="text-center" scope="col">Collection</th>
                                </tr>
                                <tr>
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
                                    <th width="8%"  class="text-center" scope="col">备注</th>
                                    <th width="7%" class="text-center" scope="col">纸箱代号</th>
                                    <th width="7%" class="text-center" scope="col">纸箱代号</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($cartonorders as $key => $cartonorder)
                                        <tr>

                                            <td class="text-center">{{$cartonorder['ctn_factory_po']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_dc_code']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_master_po']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_material']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_desc']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_style_size']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_pl_quantity']}}</td>
                                            <td class="text-center">{{$cartonorder['ctn_mcq']}}</td>
                                            <td class="text-center">A=A 200LB</td>
                                            <td class="text-center">{{$cartonorder['ctn_carton']}}CM</td>
                                            <td class="text-center">{{$cartonorder['ctn_quantity']}}</td>
                                            <td class="text-center">1.01</td>
                                            <td class="text-center">1.02</td>
                                            <td class="text-center">$1.07</td>
                                            <td class="text-center">$ {{$cartonorder['ctn_quantity'] * 1.07}} </td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

