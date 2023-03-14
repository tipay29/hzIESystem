
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


            @for($x = 0; $x < count($packinglists);$x++)
                    @if($x == count($packinglists)-1)
                        <tr>
                            <td scope="col"></td>
                            <td  scope="col"></td>
                            <td scope="col"></td>
                            <td align="right" scope="col"> <b> {{number_format($packinglists[$x]['total_qty_ship'])}} </b></td>
                            <td align="right" scope="col"> <b> {{number_format($packinglists[$x]['total_carton'])}} </b> </td>
                            <td align="right" scope="col"> <b> {{number_format($packinglists[$x]['total_nw'], 2, '.', ',')}} </b></td>
                            <td align="right" scope="col"> <b> {{number_format($packinglists[$x]['total_gw'], 2, '.', ',')}} </b> </td>
                            <td align="right" scope="col"> <b> {{number_format($packinglists[$x]['total_cbm'], 2, '.', ',')}} </b> </td>
                        </tr>
                    @elseif($packinglists[$x]['row_cut'] == 1)
                        <tr>

                            <td scope="col">{{$packinglists[$x]['pl_style_size']}}</td>
                            <td  scope="col">{{$packinglists[$x]['pl_description']}}</td>
                            <td scope="col">{{$packinglists[$x]['pl_color']}}</td>

                            <td align="right" scope="col">{{number_format($packinglists[$x]['pl_order_quantity'])}}</td>

                            @if(!isset($packinglists[$x+1]['row_cut']) || $packinglists[$x+1]['row_cut'] == 1))
                                <td align="right" scope="col">{{number_format($packinglists[$x]['pl_number_of_carton'])}}</td>
                                <td align="right" scope="col">{{number_format($packinglists[$x]['net_weight_total'], 2, '.', ',')}}</td>
                                <td align="right" scope="col">{{number_format($packinglists[$x]['gross_weight_total'], 2, '.', ',')}}</td>
                                <td align="right" scope="col">{{number_format($packinglists[$x]['cbm'], 2, '.', ',')}}</td>
                            @else
                                <td align="right" scope="col">{{number_format($packinglists[$x]['pl_number_of_carton']
                                                                        +
                                                                $packinglists[$x+1]['pl_number_of_carton'])}}</td>

                                <td align="right" scope="col">{{number_format($packinglists[$x]['net_weight_total']
                                                                        +
                                                                $packinglists[$x+1]['net_weight_total'], 2, '.', ',')}}</td>

                                <td align="right" scope="col">{{number_format($packinglists[$x]['gross_weight_total']
                                                                        +
                                                                $packinglists[$x+1]['gross_weight_total'], 2, '.', ',')}}</td>
                                <td align="right" scope="col">{{number_format($packinglists[$x]['cbm']
                                                                        +
                                                                $packinglists[$x+1]['cbm'], 2, '.', ',')}}</td>
                            @endif

                        </tr>
                    @endif

            @endfor
            </tbody>
        </table>
    </div>

