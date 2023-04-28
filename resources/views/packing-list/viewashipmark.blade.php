<div class="row">


    <div style="min-height: 50px;" class="col-md-6">

        <img src="{{ asset('storage/images/shipmark/' . $packinglists[$x][0]['pl_brand'] .
                                    '/' . $packinglists[$x][0]['pl_type'] . '/' .
                                    trim($packinglists[$x][0]['pl_country'] . " " .
                                      $packinglists[$x][0]['pl_country_two']) .
                                      '.png') }}"
             class="img-fluid">

    </div>
    <div style="min-height: 50px;" class="col-md-6">
        <h6 class="text-center" style="border: 1px solid black;">Summary Details <b> {{$packinglists[$x][0]['pl_factory_po']}} </b></h6>
        <div class="row">
            <div style="min-height: 50px;" class="col-md-5">

                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-center" > <u>Pack details</u></h6>
                                <div class="table-responsive">
                                    <table class="table pl_table_number">
                                        <thead>
                                        <tr>
                                            <th>
                                                Special Pack
                                            </th>
                                            <th>Pre Pack</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input
                                                    style="text-align: center;
                                                   border: 1px solid black;border-radius: 0px; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                                                    id="pl_special_pack" type="text" class="form-control" value="{{$packinglists[$x][0]['pl_special_packs']}}"
                                                @cannot('create', App\Models\PackingList::class)
                                                    {{'disabled'}}
                                                    @endcannot
                                                >
                                            </td>
                                            <td>
                                                <input
                                                    style="text-align: center;
                                                   border: 1px solid black;border-radius: 0px;background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                                                    id="pl_pre_pack" type="number" step="1" class="form-control" value="{{$packinglists[$x][0]['pl_pre_pack']}}"
                                                @cannot('create', App\Models\PackingList::class)
                                                    {{'disabled'}}
                                                    @endcannot
                                                >

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-center" > <u>Carton details</u></h6>
                                <div class="table-responsive">
                                    <table class="table pl_table_number">
                                        <thead>
                                        <tr>
                                            <th>
                                                Carton
                                            </th>
                                            <th>Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($packinglists[$x][count($packinglists[$x])-1]['mcqcarton_details']['carton_details'] as $key => $carton)
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td>{{$carton}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td> No Carton Record!!!</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div style="min-height: 50px;" class="col-md-7">
                <h6 class="text-center" > <u>MCQ details</u></h6>
                <div class="table-responsive">
                    <table class="table pl_table_number">
                        <thead>
                        <tr>
                            <th>
                                @if($packinglists[$x][0]['pl_type'] == "APPAREL")
                                    Size
                                @else
                                    Style
                                @endif
                            </th>
                            <th>Carton</th>
                            <th class="text-end">MCQ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($packinglists[$x][count($packinglists[$x])-1]['mcqcarton_details']['mcq_details'] as $key => $mcq)
                            <tr>
                                <td>{{$mcq['basis']}} </td>
                                <td>{{$mcq['carton_size']}}CM </td>
                                <td class="text-end">{{$mcq['mcq']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


        </div>


    </div>

</div>
