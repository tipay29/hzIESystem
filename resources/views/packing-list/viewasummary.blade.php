
    <div class="table-responsive">
        <table class="table pl_table_number" >
            <thead>
            <tr>
                <th width="10%">Size Summary:</th>
                <th width="25%">Description</th>
                <th width="15%">Color</th>
                <th class="text-end" width="10%">Quantity</th>
                <th class="text-end" width="8%">Carton</th>
                <th class="text-end" width="8%">Net Weight</th>
                <th class="text-end" width="16%">Gross Weight</th>
                <th class="text-end" width="10%">CBM</th>
            </tr>
            </thead>
            <tbody>
            @for($y = 0; $y < count($packinglists[$x]);$y++)
                    @if($y == count($packinglists[$x])-1)
                    <tr>
                        <td scope="col"></td>
                        <td  scope="col"></td>
                        <td scope="col"></td>
                        <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_qty_ship'])}} </b></td>
                        <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_carton'])}} </b> </td>
                        <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_nw'], 2, '.', ',')}} </b></td>
                        <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_gw'], 2, '.', ',')}} </b> </td>
                        <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_cbm'], 2, '.', ',')}} </b> </td>
                    </tr>
                    @elseif($packinglists[$x][$y]['row_cut'] == 1)
                        <tr>

                            <td scope="col">{{$packinglists[$x][$y]['pl_style_size']}}</td>
                            <td  scope="col">{{$packinglists[$x][$y]['pl_description']}}</td>
                            <td scope="col">{{$packinglists[$x][$y]['pl_color']}}</td>

                            <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['pl_order_quantity'])}}</td>

                            @if(!isset($packinglists[$y+1]['row_cut']) || isset($packinglists[$y+1]['row_cut']) == 1 )
                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['pl_number_of_carton'])}}</td>

                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['net_weight_total'], 2, '.', ',')}}</td>

                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['gross_weight_total'], 2, '.', ',')}}</td>
                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['cbm'], 2, '.', ',')}}</td>
                            @else
                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['pl_number_of_carton']
                                                                        +
                                                                $packinglists[$y+1]['pl_number_of_carton'])}}</td>

                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['net_weight_total']
                                                                        +
                                                                $packinglists[$y+1]['net_weight_total'], 2, '.', ',')}}</td>

                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['gross_weight_total']
                                                                        +
                                                                $packinglists[$y+1]['gross_weight_total'], 2, '.', ',')}}</td>
                                <td align="right" scope="col">{{number_format((float)$packinglists[$x][$y]['cbm']
                                                                        +
                                                                $packinglists[$y+1]['cbm'], 2, '.', ',')}}</td>
                            @endif

                        </tr>
                    @endif

            @endfor
            </tbody>
        </table>
    </div>

