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

            <h4 class="text-center">PACKING LIST</h4>
            <input type="text" class="form-control"
                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_factory_po']}}"
            @cannot('create', App\Models\PackingList::class)
                {{'disabled'}}
                @endcannot>
            <input type="text" class="form-control"
                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_shipment_mode']}}"

            @cannot('create', App\Models\PackingList::class)
                {{'disabled'}}
                @endcannot>

            <textarea rows="2" id="pl_rm_input" style="min-width: 100%"
               @cannot('create', App\Models\PackingList::class)
                   {{'disabled'}}
                   @endcannot
        >Remarks:
                                        {{$packinglists[$x][0]['pl_remarks']}}
        </textarea>



        </div>

        <div class="col-md-4" style="" >

            <div class="row">
                <h6 for="" class="col-md-6 text-md-end"> Status:</h6>

                <select disabled id="pl_status" class="col-md-6 text-start" style="
                    {{$packinglists[$x][0]['pl_status']=="Drafted" ? 'background-color:yellow;' : ''}}
                    {{$packinglists[$x][0]['pl_status']=="Canceled" ? 'background-color:red;' : ''}}
                    {{$packinglists[$x][0]['pl_status']=="Final" ? 'background-color:green;color:white;' : ''}}
                                        font-size: 1rem;
                                        border:none;"
                @cannot('create', App\Models\PackingList::class)
                    {{'disabled'}}
                    @endcannot>
                    <option value="Draft"
                        {{ $packinglists[$x][0]['pl_status']=="Draft" ? 'selected' : ''  }}
                    >Draft</option>
                    <option value="Cancelled"
                        {{ $packinglists[$x][0]['pl_status']=="Cancelled" ? 'selected' : ''  }}
                    >Cancelled</option>
                    <option value="Final"
                        {{ $packinglists[$x][0]['pl_status']=="Final" ? 'selected' : ''  }}
                    >Final</option>

                </select>

            </div>

            <div class="row">
                <h6  class="col-md-6 text-md-end"> MD:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{\App\Models\User::where('id',$packinglists[$x][0]['user_id'])->first()->name}}
                </p>

            </div>

            <div class="row">
                <h6 for="" class="col-md-6 text-md-end"> CRD:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{$packinglists[$x][0]['pl_crd']}}
                </p>

            </div>
            <div class="row">
                <h6  class="col-md-6 text-md-end"> Customer Name:</h6>

                <p class="col-md-6 text-start m-0" style="font-size: 1rem;">
                    {{$packinglists[$x][0]['pl_country'] . " " . $packinglists[$x][0]['pl_country_two']}}
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
                                                    " value="{{$packinglists[$x][0]['pl_destination']}}"
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


        </div>
    </div>
</div>
