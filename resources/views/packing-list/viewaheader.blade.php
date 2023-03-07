<div class="card-header ">
    <div class="row">
        <div class="col-md-4">

            <img src="{{ asset('storage/images/horizonlogo.png') }}" width="85" height="40" alt="Horizon Outdoor">
            <small> <b> Horizon Outdoor Cambodia Co. LTD </b> </small> <br>
            <p class="m-0" style="font-size: .8rem; ">
                National Highway 5, 43km Phum Phsar Trach, Khum Longvek,</p>
            <p class="m-0" style="font-size: .8rem; ">
                Srok Kampong Tralach, Kampong Chhnang Province, Cambodia</p>
            <p class="text-start m-0" style="font-size: 1rem;">
                Country Origin: Cambodia
            </p>
        </div>

        <div class="col-md-4" >

            <h4 class="text-center">PACKING LIST</h4>
            <input type="text" class="form-control"
                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_factory_po']}}">
            <input type="text" class="form-control"
                   style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    " value="{{$packinglists[$x][0]['pl_shipment_mode']}}">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>MCQ</th>
                            <th>Carton</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($packinglists[$x][count($packinglists[$x])-1]['total_ctn_ctn'] as $key => $ctn)
                        <tr>
                            <td>{{$packinglists[$x][count($packinglists[$x])-1]['total_ctn_mcq'][$key]}} </td>
                            <td>{{$key}}CM </td>
                            <td>{{$ctn}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row ">
                <label for="pl_mcq_weight_input" class="col-md-4 text-md-end">Special Pack</label>
                <div class="col-md-6 ">
                    <input
                        style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                        id="pl_special_pack" type="text" class="form-control" value="{{$packinglists[$x][0]['pl_special_packs']}}"
                    >
                </div>
            </div>
            <div class="row">
                <label for="pl_mcq_weight_input" class="col-md-4 text-md-end">Pre Pack</label>
                <div class="col-md-6 ">
                    <input
                        style="text-align: center;
                                                   border: 0; background-color:	 #f1f1f1;
                                                   font-weight: 500;font-size: 1.2rem;
                                                   padding:0px;line-height: 10px;
                                                    "
                        id="pl_pre_pack" type="number" step="1" class="form-control" value="{{$packinglists[$x][0]['pl_pre_pack']}}"
                    >
                </div>
            </div>

        </div>

        <div class="col-md-4" style="" >

            <div class="row">
                <h6 for="" class="col-md-6 text-md-end"> Status:</h6>

                <select id="pl_status" class="col-md-6 text-start" style="
                    {{$packinglists[$x][0]['pl_status']=="Drafted" ? 'background-color:yellow;' : ''}}
                    {{$packinglists[$x][0]['pl_status']=="Canceled" ? 'background-color:red;' : ''}}
                    {{$packinglists[$x][0]['pl_status']=="Final" ? 'background-color:green;color:white;' : ''}}
                                        font-size: 1rem;
                                        border:none;">
                    <option value="Drafted"
                        {{ $packinglists[$x][0]['pl_status']=="Drafted" ? 'selected' : ''  }}
                    >Drafted</option>
                    <option value="Canceled"
                        {{ $packinglists[$x][0]['pl_status']=="Canceled" ? 'selected' : ''  }}
                    >Canceled</option>
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
                    {{$packinglists[$x][0]['pl_country']}}
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
                                                    " value="{{$packinglists[$x][0]['pl_destination']}}">

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
