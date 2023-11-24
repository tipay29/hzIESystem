<div class="row">

    {{--{{dd($packinglists[0])}}--}}
    <div style="min-height: 50px;" class="col-md-6">

        <h6>Carton Marking</h6>

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
                    <input type="hidden" name="country_two" value="{{$packinglists[0]['pl_country_two']}}">
                    <input id="pl_select_brand" type="hidden" name="brand" value="{{$packinglists[0]['pl_brand']}}">
                    <input id="pl_select_type" type="hidden" name="type" value="{{$packinglists[0]['pl_type']}}">
                    Select PNG to upload:
                    <input type="file" name="file" >
                    <input type="submit" name="submit">

                </form>
            </div>
        @endcan
        <h6>Packing Method</h6>
        <textarea rows="12" id="pl_rm_input_two" style="min-width: 100%"
               @cannot('create', App\Models\PackingList::class)
                   {{'disabled'}}
                   @endcannot
        >
            @if($packinglists[0]['pl_type'] == "APPAREL")
                ***入箱方式:
                1.每一个纸箱用要印有"SECURITY SEAL"字样的6CMW胶带封口;
                2.纸箱上面要放一块三层纸板
                干燥剂在衣服右胸内里及左口袋内里各放一包。
                其中WHITE & MOONLIGHT IVORY&Vaporous Grey 颜色应纸箱
                上下对角各放三包，不放三层纸板。
                3.入箱要平整,规范。样衣请调头交换入箱.
                4.样衣入箱后,如纸箱尺寸有问题,请及时通知生管.
                5.因表布每缸会有色差。每箱入箱时，
                有色差的不可同时装在一箱内。
                6.请提供各尺寸的单件重量及各尺寸的装箱净毛重.
                7.纸箱侧需贴NGC,有记号点（贴纸要贴正）
            @endif

                                        {{$packinglists[0]['pl_remarks_two']}}
        </textarea>
    </div>

    <div style="min-height: 50px;" class="col-md-6">
            <h6 class="text-center" style="">Summary  </h6>
        <h6 class="text-center" style=""> Factory PO: <b> {{$packinglists[0]['pl_factory_po']}} </b></h6>
            <div class="row">
                <div style="min-height: 50px;" class="col-md-5">

                    <div class="row">
                        <div class="col-md-12">




                            <div class="row">
                                <div class="col-md-12" style="border:1px solid black;">
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
                                           <div style="display: none;"> @php $total = 0; @endphp</div>
                                                @forelse($packinglists[count($packinglists)-1]['mcqcarton_details']['carton_details'] as $key => $carton)
                                                    <tr>
                                                        <td>{{$key}}</td>
                                                        <td>{{$carton}}</td>
                                                    </tr>
                                                    <div style="display: none;"> {{$total += $carton}}</div>

                                                @empty
                                                    <tr>
                                                        <td> No Carton Record!!!</td>
                                                    </tr>
                                                @endforelse
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{$total}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="border:1px solid black;">
                                    <h6 class="text-center" > <u>Pack details</u></h6>
                                    <div class="table-responsive">
                                        <table class="table pl_table_number">
                                            <thead>
                                            <tr>
                                                <th width="50%">
                                                    Special Pack
                                                </th>
                                                <th width="50%">
                                                    <input
                                                        style="text-align: center;
                                                   background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                                                        id="pl_special_pack" type="text" class="form-control" value="{{$packinglists[0]['pl_special_packs']}}"
                                                    @cannot('create', App\Models\PackingList::class)
                                                        {{'disabled'}}
                                                        @endcannot
                                                    >

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Pre Pack</b>
                                                </td>
                                                <td>
                                                    <input
                                                        style="text-align: center;
                                                   border-radius: 0px;background-color:	 #f1f1f1;
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

                        </div>

                    </div>

                </div>
                <div style="min-height: 50px; border:1px solid black;" class="col-md-7">
                    <h6 class="text-center" > <u>MCQ details</u></h6>
                    <div class="table-responsive">
                        <table class="table pl_table_number">
                            <thead>
                            <tr>
                                <th width="35%">
                                    @if($packinglists[0]['pl_type'] == "APPAREL")
                                        Size
                                    @else
                                        Style
                                    @endif
                                </th>
                                <th width="=35%">Carton</th>
                                <th width="30%" class="text-end">MCQ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packinglists[count($packinglists)-1]['mcqcarton_details']['mcq_details'] as $key => $mcq)
                                <tr>
                                    <td>

                                            {{$mcq['basis']}}


                                    </td>
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
