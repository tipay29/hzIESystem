@if($packinglists[0]['pl_type'] == "APPAREL")
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
            @for($x = 0; $x < count($packinglists)-1;$x++)

                    @if($packinglists[$x]['row_cut'] == 1)
                        <tr>

                            <td scope="col">{{$packinglists[$x]['pl_style_size']}}</td>
                            <td  scope="col">{{$packinglists[$x]['pl_description']}}</td>
                            <td scope="col">{{$packinglists[$x]['pl_color']}}</td>

                            <td scope="col">{{$packinglists[$x]['pl_order_quantity']}}</td>

                            @if(!isset($packinglists[$x+1]['row_cut']) || $packinglists[$x+1]['row_cut'] == 1))
                                <td scope="col">{{$packinglists[$x]['pl_number_of_carton']}}</td>

                                <td scope="col">{{$packinglists[$x]['net_weight_total']}}</td>

                                <td scope="col">{{$packinglists[$x]['gross_weight_total']}}</td>
                                <td scope="col">{{$packinglists[$x]['cbm']}}</td>
                            @else
                                <td scope="col">{{$packinglists[$x]['pl_number_of_carton']
                                                                        +
                                                                $packinglists[$x+1]['pl_number_of_carton']}}</td>

                                <td scope="col">{{$packinglists[$x]['net_weight_total']
                                                                        +
                                                                $packinglists[$x+1]['net_weight_total']}}</td>

                                <td scope="col">{{$packinglists[$x]['gross_weight_total']
                                                                        +
                                                                $packinglists[$x+1]['gross_weight_total']}}</td>
                                <td scope="col">{{$packinglists[$x]['cbm']
                                                                        +
                                                                $packinglists[$x+1]['cbm']}}</td>
                            @endif

                        </tr>
                    @endif

            @endfor
            </tbody>
        </table>
    </div>
@endif
