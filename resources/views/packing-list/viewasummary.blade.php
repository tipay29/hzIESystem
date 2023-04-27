<h6>Summary:</h6>
    <div class="table-responsive">
        <table class="table pl_table_number" >
            <thead>
            <tr>

                <th width="10%">Style</th>
                <th width="20%">Description</th>
                <th width="15%">Color</th>
                @if($packinglists[0][0]['pl_type'] === "APPAREL")
                <th width="10%">Size</th>
                @endif
                <th class="text-end" width="10%">Quantity</th>
                <th class="text-end" width="8%">Carton</th>
                <th class="text-end" width="8%">Net Weight</th>
                <th class="text-end" width="10%">Gross Weight</th>
                <th class="text-end" width="10%">CBM</th>
            </tr>
            </thead>

            @if($packinglists[0][0]['pl_type'] == "APPAREL")
                <tbody>
                @foreach($packinglists[$x][count($packinglists[$x])-1]['summary'] as $key => $summaryrow)
                    <tr>
                        <td scope="col">{{$summaryrow['pl_material']}}</td>
                        <td  scope="col">{{$summaryrow['pl_description']}}</td>
                        <td scope="col">{{$summaryrow['pl_color']}}</td>
                        <td scope="col">{{$summaryrow['pl_size']}}</td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_quantity'])}}</td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_carton'])}}</td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_nw'], 2, '.', ',')}} </td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_gw'], 2, '.', ',')}}  </td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_cbm'], 2, '.', ',')}} </td>
                    </tr>


                @endforeach

                <tr>
                    <td scope="col"></td>
                    <td  scope="col"></td>
                    <td scope="col"></td>
                    <td scope="col"></td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_qty_ship'])}} </b></td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_carton'])}} </b> </td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_nw'], 2, '.', ',')}} </b></td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_gw'], 2, '.', ',')}} </b> </td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_cbm'], 2, '.', ',')}} </b> </td>
                </tr>

                </tbody>
            @endif
            @if($packinglists[0][0]['pl_type'] == "EQUIPMENT")
                <tbody>
                @foreach($packinglists[$x][count($packinglists[$x])-1]['summary'] as $key => $summaryrow)
                    <tr>
                        <td scope="col">{{$summaryrow['pl_material']}}</td>
                        <td  scope="col">{{$summaryrow['pl_description']}}</td>
                        <td scope="col">{{$summaryrow['pl_color']}}</td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_quantity'])}}</td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_carton'])}}</td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_nw'], 2, '.', ',')}} </td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_gw'], 2, '.', ',')}}  </td>
                        <td align="right" scope="col"> {{number_format((float)$summaryrow['pl_cbm'], 2, '.', ',')}} </td>
                    </tr>


                @endforeach

                <tr>
                    <td scope="col"></td>
                    <td  scope="col"></td>
                    <td scope="col"></td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_qty_ship'])}} </b></td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_carton'])}} </b> </td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_nw'], 2, '.', ',')}} </b></td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_gw'], 2, '.', ',')}} </b> </td>
                    <td align="right" scope="col"> <b> {{number_format((float)$packinglists[$x][count($packinglists[$x])-1]['total_cbm'], 2, '.', ',')}} </b> </td>
                </tr>

                </tbody>
            @endif
        </table>
    </div>

