@if($packinglists[$x][0]['pl_type'] == "APPAREL")
    <div class="table-responsive">
        <table class="table" >
            <thead>
            <tr>
                <th width="10%">Size Summary:</th>
                <th width="25%">Description</th>
                <th width="15%">Color</th>
                <th width="10%">Quantity</th>
                <th width="8%">Carton</th>
                <th width="8%">Net Weight</th>
                <th width="16%">Gross Weight</th>
                <th width="10%">CBM</th>
            </tr>
            </thead>
            <tbody>
            @for($y = 0; $y < count($packinglists[$x]);$y++)
                    @if($y == count($packinglists[$x])-1)
                    <tr>
                        <td scope="col"></td>
                        <td  scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"> <b> {{$packinglists[$x][$y]['total_qty_ship']}} </b></td>
                        <td scope="col"> <b> {{$packinglists[$x][$y]['total_carton']}} </b> </td>
                        <td scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_nw'], 2, '.', '')}} </b></td>
                        <td scope="col"> <b> {{number_format((float)$packinglists[$x][$y]['total_gw'], 2, '.', '')}} </b> </td>
                        <td scope="col"> <b> {{$packinglists[$x][$y]['total_cbm']}} </b> </td>
                    </tr>
                    @elseif($packinglists[$x][$y]['row_cut'] == 1)
                        <tr>

                            <td scope="col">{{$packinglists[$x][$y]['pl_style_size']}}</td>
                            <td  scope="col">{{$packinglists[$x][$y]['pl_description']}}</td>
                            <td scope="col">{{$packinglists[$x][$y]['pl_color']}}</td>

                            <td scope="col">{{$packinglists[$x][$y]['pl_order_quantity']}}</td>

                            @if(!isset($packinglists[$y+1]['row_cut']) || isset($packinglists[$y+1]['row_cut']) == 1 )
                                <td scope="col">{{$packinglists[$x][$y]['pl_number_of_carton']}}</td>

                                <td scope="col">{{$packinglists[$x][$y]['net_weight_total']}}</td>

                                <td scope="col">{{$packinglists[$x][$y]['gross_weight_total']}}</td>
                                <td scope="col">{{$packinglists[$x][$y]['cbm']}}</td>
                            @else
                                <td scope="col">{{$packinglists[$x][$y]['pl_number_of_carton']
                                                                        +
                                                                $packinglists[$y+1]['pl_number_of_carton']}}</td>

                                <td scope="col">{{$packinglists[$x][$y]['net_weight_total']
                                                                        +
                                                                $packinglists[$y+1]['net_weight_total']}}</td>

                                <td scope="col">{{$packinglists[$x][$y]['gross_weight_total']
                                                                        +
                                                                $packinglists[$y+1]['gross_weight_total']}}</td>
                                <td scope="col">{{$packinglists[$x][$y]['cbm']
                                                                        +
                                                                $packinglists[$y+1]['cbm']}}</td>
                            @endif

                        </tr>
                    @endif

            @endfor
            </tbody>
        </table>
    </div>
@endif
