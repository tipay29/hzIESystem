<div class="card-header ">
    <div class="row">
        <div class="col-md-4">

            <img src="{{ asset('storage/images/horizonlogo.png') }}" width="95" height="40" alt="Horizon Outdoor">
            <br>
            <b> Horizon Outdoor Cambodia CO., LTD </b> <br>
            <p class="m-0" style="font-size: .8rem; ">
                National Highway 5, 43 Kilometers, Phum Phsar Trach, Khum Longvek,</p>
            <p class="m-0" style="font-size: .8rem; ">
                Srok Kampong Trolach,Kampong Chhnang Province, Cambodia</p>
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

            <textarea rows="2" id="pl_rm_input" style="min-width: 100%"
               @cannot('create', App\Models\PackingList::class)
                   {{'disabled'}}
                   @endcannot
        >Remarks:
                                        {{$packinglists[0]['pl_remarks']}}
        </textarea>


            <input id="ctn_brand" type="hidden" value="{{$packinglists[0]['pl_brand']}}">
            <input id="ctn_type" type="hidden" value="{{$packinglists[0]['pl_type']}}">

            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][0]))
                <input type="hidden" id="size_one" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][0]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][0]))
                <input type="hidden" id="size_value_one" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][0]}}">
                @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][1]))
                <input type="hidden" id="size_two" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][1]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][1]))
                <input type="hidden" id="size_value_two" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][1]}}">
                @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][2]))
                <input type="hidden" id="size_three" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][2]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][2]))
                <input type="hidden" id="size_value_three" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][2]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][3]))
                <input type="hidden" id="size_four" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][3]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][3]))
                <input type="hidden" id="size_value_four" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][3]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][4]))
                <input type="hidden" id="size_five" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][4]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][4]))
                <input type="hidden" id="size_value_five" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][4]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][5]))
                <input type="hidden" id="size_six" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][5]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][5]))
                <input type="hidden" id="size_value_six" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][5]}}">
                @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][6]))
                <input type="hidden" id="size_seven" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][6]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][6]))
                <input type="hidden" id="size_value_seven" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][6]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][7]))
                <input type="hidden" id="size_eight" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][7]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][7]))
                <input type="hidden" id="size_value_eight" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][7]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][8]))
                <input type="hidden" id="size_nine" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][8]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][8]))
                <input type="hidden" id="size_value_nine" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][8]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][9]))
                <input type="hidden" id="size_ten" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][9]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][9]))
                <input type="hidden" id="size_value_ten" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][9]}}">
                    @endif
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
                <h6  class="col-md-6 text-md-end"> Print Date:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{now()->format('Y-m-d H:i')}}
                </p>

            </div>

            <div class="row">
                <h6 for="" class="col-md-6 text-md-end"> CRD:</h6>

                <input id="pl_crd_input" class="col-md-6 text-start"
                       type="date"
                       style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 15px;padding-left: 0.7em;
                                                    " value="{{$packinglists[0]['pl_crd']}}"
                @cannot('create', App\Models\PackingList::class)
                    {{'disabled'}}
                @endcannot
                >




            </div>
            <div class="row">
                <h6  class="col-md-6 text-md-end"> Customer Name:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{$packinglists[0]['pl_country'] . " " .$packinglists[0]['pl_country_two']}}
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

            <button style="display: none;" id="addMcqModalBtn" type="button" class="btn btn-outline-info col-md-6" data-bs-toggle="modal"
                        data-bs-target="#addMcqModal">
                    Add MCQ
            </button>

        </div>
    </div>
</div>
