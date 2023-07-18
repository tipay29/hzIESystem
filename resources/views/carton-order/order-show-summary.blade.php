

<div class="row">


    <div class="col-md-4 col-sm-4" style="min-height: 10px;">

                                   <textarea class="ctn-remarks" rows="6" style="min-width: 100%;" id="ctn_remarks">
                                    {{$carton_order->ctn_remarks}}
                                    </textarea>
    </div>

    <div class="col-md-8  col-sm-8" style="min-height: 10px;">

        <table class="table table-bordered co-create-table">
            <thead >
            <tr class="table-active" style="border:1px solid black;">
                <th colspan="10" class="text-center" scope="col">SUMMARY</th>
            </tr>
            <tr class="table-active">
                <th width="5%" class="text-center" scope="col">No</th>
                <th width="15%" class="text-center" scope="col">Description</th>
                <th width="15%" class="text-center" scope="col">Ctn Specification</th>
                <th width="15%" class="text-center" scope="col">Ctn Measurement</th>
                <th width="5%" class="text-center" scope="col">CtnQty</th>
                <th width="5%" class="text-center" scope="col">Unit</th>
                <th width="10%" class="text-center" scope="col">Unit Price USD</th>
                <th width="10%" class="text-center" scope="col">Total Amount</th>
                <th width="5%" class="text-center" scope="col">1%Allowance</th>
                <th width="5%" class="text-center" scope="col">Total</th>
            </tr>
            <tr class="table-active">
                <th width="5%" class="text-center" scope="col">序號</th>
                <th width="15%" class="text-center" scope="col">描述</th>
                <th width="15%" class="text-center" scope="col">材料</th>
                <th width="15%" class="text-center" scope="col">纸箱尺寸</th>
                <th width="5%" class="text-center" scope="col">數量</th>
                <th width="5%" class="text-center" scope="col">單位</th>
                <th width="10%" class="text-center" scope="col">單價</th>
                <th width="10%" class="text-center" scope="col">金額</th>
                <th width="5%" class="text-center" scope="col">額外</th>
                <th width="5%" class="text-center" scope="col">总数</th>
            </tr>

            </thead>
            <tbody>


            @php
                $total_allowance = 0 ;
                $total_all = 0;
                  $total_amount = 0;
                $increment =1;
            @endphp

            @foreach($carton_order->carton_order_contents->unique('carton_id') as $key => $ctn)


                @if($ctn !== "")
                    <tr>
                        <td> {{$increment}}</td>
                        <td> 纸箱Carton</td>
                        <td> {{$ctn->carton->ctn_specification}}</td>
                        <td> {{$ctn->carton->ctn_size}}CM</td>
                        <td> {{$carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')}}</td>
                        <td> pcs</td>
                        <td>$ {{$ctn->carton->ctn_fob}}</td>
                        <td>$ {{($ctn->carton->ctn_fob*
                                $carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity'))}}</td>
                        <td> {{floor($carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100)}}</td>
                        <td> {{floor($carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100) +
 $carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')}} </td>
                        <div style="display: none;">
                            {{
                    $total_allowance = $total_allowance +floor($carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100)
        }}
                            {{
$total_amount = $total_amount + ($ctn->carton->ctn_fob*
                                $carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity'))
                            }}
                            {{$total_all = $total_all + floor($carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')/100) +
 $carton_order->carton_order_contents->where('carton_id',$ctn->carton->id)->sum('ctn_quantity')}}
                        </div>
                    </tr>
                @endif

                @php
                 $increment++;
                @endphp
            @endforeach

            <tr class="table-active">
                <td > <b> 汇总 </b> </td>
                <td > <b> 纸箱Carton </b> </td>
                <td > <b> {{$ctn->carton->ctn_specification}} </b></td>
                <td> <b> TOTAL </b></td>
                <td  > <b> {{$carton_order->carton_order_contents->sum('ctn_quantity')}}  </b> </td>
                <td> <b> pcs </b></td>
                <td></td>
                <td><b>$ {{$total_amount}}</b> </td>
                <td> <b> {{$total_allowance}} </b></td>
                <td> <b> {{$total_all}} </b></td>


            </tr>
            <tr class="table-active">
                <td > <b>汇总</b> </td>
                <td colspan="2" class="text-center"> <b> 天地版Carton Paper </b> </td>
                <td > <b> 60*30CM </b></td>

                <td  > <b> {{$carton_order->carton_order_contents->sum('ctn_quantity')}}  </b> </td>
                <td> <b> pcs </b></td>
                <td> <b> $ 0.28 </b></td>
                <td><b>$ {{0.28*$carton_order->carton_order_contents->sum('ctn_quantity')}}</b> </td>
                <td>-</td>
                <td><b> {{$carton_order->carton_order_contents->sum('ctn_quantity')}}  </b> </td>


            </tr>
            </tbody>

        </table>

    </div>


</div>
