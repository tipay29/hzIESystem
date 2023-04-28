<div class="row">

    {{--{{dd($packinglists[0])}}--}}
    <div style="min-height: 50px;" class="col-md-6">


        <select name="" id="pl_select_customer" class="section-pl-to-no-print">

            <option value="0" DISABLED selected>Please select Customer</option>

            @foreach($customers as $customer)

                <option
                    value="{{trim($customer->customer_name . "-" . $customer->customer_name_two) . "-" . $customer->destination}}">
                    {{trim($customer->customer_name . " " . $customer->customer_name_two) . "-" . $customer->destination}}
                </option>

            @endforeach

        </select>

        <img src="{{ asset('storage/images/shipmark/' . $packinglists[0]['pl_brand'] .
                                    '/' . $packinglists[0]['pl_type']  . '/' .
                                    trim($packinglists[0]['pl_country']. " "
                                    .$packinglists[0]['pl_country_two']) . '.png') }}"
        class="img-fluid">

        @can('create', App\Models\PackingList::class)
            <div class="print-hide">

                <form action="{{route('packing-lists.mark')}}"
                      method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="country" value="{{$packinglists[0]['pl_country']}}">
                    <input id="pl_select_brand" type="hidden" name="brand" value="{{$packinglists[0]['pl_brand']}}">
                    <input id="pl_select_type" type="hidden" name="type" value="{{$packinglists[0]['pl_type']}}">
                    Select PNG to upload:
                    <input type="file" name="file" >
                    <input type="submit" name="submit">

                </form>
            </div>
        @endcan
    </div>

    <div style="min-height: 50px;" class="col-md-6">
            <h6 class="text-center" style="border: 1px solid black;">Summary Details <b> {{$packinglists[0]['pl_factory_po']}} </b></h6>
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
                                                            id="pl_special_pack" type="text" class="form-control" value="{{$packinglists[0]['pl_special_packs']}}"
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
                                                            id="pl_pre_pack" type="number" step="1" class="form-control" value="{{$packinglists[0]['pl_pre_pack']}}"
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
                                                @forelse($packinglists[count($packinglists)-1]['mcqcarton_details']['carton_details'] as $key => $carton)
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
                                    @if($packinglists[0]['pl_type'] == "APPAREL")
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
                            @foreach($packinglists[count($packinglists)-1]['mcqcarton_details']['mcq_details'] as $key => $mcq)
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
