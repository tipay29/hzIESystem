<div class="card-header ">
    <div class="row">
        <div class="col-md-4">

            <img src="{{ asset('storage/images/horizonlogo.png') }}" width="95" height="40" alt="Horizon Outdoor">
            <br>
            <b> Horizon Outdoor Cambodia Co. LTD </b> <br>
            <p class="m-0" style="font-size: .8rem; ">
                Phum Phsar Trach,Khum Longvek,Srok Kampong Tralach,</p>
            <p class="m-0" style="font-size: .8rem; ">
                Kampong Chhnang Province,Cambodia</p>
            <p class="m-0" style="font-size: .8rem; ">
                Tel: 855-78-210 076</p>
            <p class="text-start m-0" style="font-size: .9rem;">
                <b>Country of Origin:</b> Cambodia
            </p>
        </div>

        <div class="col-md-4" >
            {{--                                {{dd($packinglists[0])}}--}}
            <h4 class="text-center">PACKING LIST</h4>
            <input id="pl_factory_po_input" type="text" class="form-control"
                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_factory_po']}}"
                @cannot('create', App\Models\PackingList::class)
                {{'disabled'}}
                @endcannot
            >
            <input disabled id="pl_shipment_input" type="text" class="form-control"
                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[0]['pl_shipment_mode']}}">



            <div class="table-responsive">
                <table class="table pl_table_number">
                    <thead>
                    <tr>
                        <th>MCQ</th>
                        <th>Carton</th>
                        <th class="text-end">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($packinglists[count($packinglists)-1]['total_ctn_ctn'] as $key => $ctn)
                        <tr>
                            <td>{{$packinglists[count($packinglists)-1]['total_ctn_mcq'][$key]}} </td>
                            <td>{{$key}}CM </td>
                            <td align="right">{{number_format((float)$ctn)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row ">
                <div class="col-md-2"></div>
                <label for="pl_mcq_weight_input" class="col-md-4 text-md-end m-0" style="border: 1px solid black;">Special Pack</label>
                <div class="col-md-4 m-0 p-0">
                    <input
                        style="text-align: center;
                                                   border: 1px solid black;border-radius: 0px; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                        id="pl_special_pack" type="text" class="form-control" value="{{$packinglists[0]['pl_special_packs']}}"
                        @cannot('create', App\Models\PackingList::class)
                        {{'disabled'}}
                        @endcannot>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <label for="pl_mcq_weight_input" class="col-md-4 text-md-end m-0" style="border: 1px solid black;">Pre Pack</label>
                <div class="col-md-4 m-0 p-0">
                    <input
                        style="text-align: center;
                                                   border: 1px solid black;border-radius: 0px;background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                        id="pl_pre_pack" type="number" step="1" class="form-control" value="{{$packinglists[0]['pl_pre_pack']}}"
                    @cannot('create', App\Models\PackingList::class)
                        {{'disabled'}}
                        @endcannot>
                </div>
                <div class="col-md-2"></div>
            </div>


            <input id="ctn_brand" type="hidden" value="{{$packinglists[0]['pl_brand']}}">
            <input id="ctn_type" type="hidden" value="{{$packinglists[0]['pl_type']}}">

            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][0]))
                <input type="hidden" id="size_one" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][0]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][1]))
                <input type="hidden" id="size_two" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][1]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][2]))
                <input type="hidden" id="size_three" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][2]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][3]))
                <input type="hidden" id="size_four" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][3]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][4]))
                <input type="hidden" id="size_five" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][4]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][5]))
                <input type="hidden" id="size_six" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][5]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][6]))
                <input type="hidden" id="size_seven" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][6]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][7]))
                <input type="hidden" id="size_eight" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][7]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][8]))
                <input type="hidden" id="size_nine" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][8]}}">
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][9]))
                <input type="hidden" id="size_ten" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][9]}}">
            @endif

        </div>

        <div class="col-md-4" style="" >


            <div class="row">
                <h6 for="" class="col-md-6 text-md-end"> Status:</h6>

                <select id="pl_status" class="col-md-6 text-start" style="
                {{$packinglists[0]['pl_status']=="Drafted" ? 'background-color:yellow;' : ''}}
                {{$packinglists[0]['pl_status']=="Canceled" ? 'background-color:red;' : ''}}
                {{$packinglists[0]['pl_status']=="Final" ? 'background-color:green;color:white;' : ''}}
                                        font-size: 1rem;
                                        border:none;"
                @cannot('create', App\Models\PackingList::class)
                    {{'disabled'}}
                    @endcannot
                >
                    <option value="Draft"
                        {{ $packinglists[0]['pl_status']=="Draft" ? 'selected' : ''  }}
                    >Draft</option>
                    <option value="Cancelled"
                        {{ $packinglists[0]['pl_status']=="Cancelled" ? 'selected' : ''  }}
                    >Cancelled</option>
                    <option value="Final"
                        {{ $packinglists[0]['pl_status']=="Final" ? 'selected' : ''  }}
                    >Final</option>

                </select>

            </div>
            <div class="row">
                <h6  class="col-md-6 text-md-end"> MD:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{\App\Models\User::where('id',$packinglists[0]['user_id'])->first()->name}}
                </p>

            </div>

            <div class="row">
                <h6 for="" class="col-md-6 text-md-end"> CRD:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{$packinglists[0]['pl_crd']}}
                </p>

            </div>
            <div class="row">
                <h6  class="col-md-6 text-md-end"> Customer Name:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{$packinglists[0]['pl_country']}}
                </p>

            </div>
            <div class="row">
                <h6  class="col-md-6 text-md-end"> Destination Country:</h6>

                <input id="pl_destination_input" class="col-md-6 text-start"
                       type="text"
                       style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;padding-left: 0.7em;
                                                    " value="{{$packinglists[0]['pl_destination']}}"
                @cannot('create', App\Models\PackingList::class)
                    {{'disabled'}}
                    @endcannot>

            </div>

            <div class="row">
                <h6  class="col-md-6 text-md-end"> Print Date:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{now()->format('Y-m-d H:i')}}
                </p>

            </div>



            <button style="display: none;" id="addMcqModalBtn" type="button" class="btn btn-outline-info col-md-6" data-bs-toggle="modal"
                        data-bs-target="#addMcqModal">
                    Add MCQ
            </button>






        </div>
    </div>
</div>
