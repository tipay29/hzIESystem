<div class="card-header ">
    <div class="row mb-1 mt-1">
        <div class="col-md-4 col-sm-4">
            <img src="{{ asset('storage/images/horizonlogoword.png') }}" width="120" height="45" alt="Horizon Outdoor">
        </div>
        <div class="col-md-4 col-sm-4">
            <h5   class="text-center ctn-title-factory">Horizon Cambodia Purchase Order</h5>
            <h5  class="text-center ctn-title-factory">宏盛柬埔寨采购单</h5>
        </div>
        <div class="col-md-4 col-sm-4">
            <a href="{{url()->previous()}}" style="float:right;"
               class="btn btn-outline-secondary section-no-print-none">
                Back</a>
            <a href="#" style="float:right;margin-right:5px;"

               class="btn btn-outline-success section-no-print-none" id="ctn_approve_btn">
                Approve</a>
            <a href="#" style="float:right;margin-right:5px;"

               class="btn btn-outline-success section-no-print-none" id="ctn_btn_edit_show" disabled>
                Edit</a>

            <a href="#" id="ctn_print" style="float:right;margin-right:5px;"
               class="btn btn-outline-primary section-no-print-none">
                Print</a>

            <button id="emailCtnOrderBtn" type="button" class="btn btn-outline-success section-no-print-none" data-bs-toggle="modal"
                    data-bs-target="#emailCtnOrderModal" style="float:right;margin-right:5px;">
                Email
            </button>


            <a href="{{route('carton-orders.export', $carton_order->id)}}" style="float:right;margin-right:5px;"
               class="btn btn-outline-success section-no-print-none">
                Excel</a>

        </div>

    </div>


    <div class="row bg-white pt-2 " id="row-carton-header">
        <div class="col-md-4 col-sm-4">

            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Bill# 采购单号:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start text-un" id="ctn_bill_code">
                        {{$carton_order->ctn_bill_code}}
                </h6>

                <input type="hidden" id="ctn_order_id" value="{{$carton_order->id}}">

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Bill To 采购方:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> HORIZON OUTDOOR (CAMBODIA) CO., LTD.</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Phoum Psar Trach, National road  NO.5,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Khum LoungVek, Srok Kompong Trach,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Kompong Chhnang Province,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Cambodia</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> ATTN 联系人:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> {{$carton_order->user->name}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> TEL 电话:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> {{$carton_order->user->employee->phone}}</h6>
            </div>

            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end">E-mail 邮箱:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start">{{$carton_order->user->email}}</h6>
            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Remark备注:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> VAT100186432</h6>
            </div>

        </div>

        {{--        MIDDLE--}}


        <div class="col-md-4 col-sm-4" style="" >

            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end">Orderdate下单日:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="ctn_order_date">     {{$carton_order->ctn_order_date}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end">Supplier供应方:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_name_en"> {{$carton_order->supplier->name_ch}}</h6>
-
            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_name_en">{{$carton_order->supplier->name_en}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_address_one"> {{$carton_order->supplier->address_one}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_address_two"> {{$carton_order->supplier->address_two}} </h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_address_three"> {{$carton_order->supplier->address_three}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end" > ATTN 联系人:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_attn"> {{$carton_order->supplier->attn}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> TEL 电话:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_phone"> {{$carton_order->supplier->phone}}</h6>

            </div>

            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end">E-mail 邮箱:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_email">{{$carton_order->supplier->email}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Remark备注:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="h6_supplier_remark">{{$carton_order->supplier->remark}}</h6>

            </div>


        </div>

        <div class="col-md-4 col-sm-4" >

            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Del Date 交期:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start" id="ctn_delivery_date">  {{$carton_order->ctn_delivery_date}}  </h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Del To 送至:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> 宏盛柬埔寨-7厂仓库</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Phoum Psar Trach，National road  NO.5,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Khum LoungVek, Srok Kompong Trach,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Kompong Chhnang Province,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> Cambodia</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> ATTN 联系人:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> YU Yang</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> TEL 电话:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> +855 011 58 79 33</h6>

            </div>

            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end">E-mail 邮箱:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"></h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 col-sm-3 text-md-end"> Remark备注:</h6>

                <h6 for="" class="col-md-9 col-sm-9 text-md-start"> </h6>

            </div>




        </div>
    </div>

    <div class="row bg-white">
        <div class="col-md-12 col-sm-12">
            <div class="row">
{{--                <div class="col-sm-1"></div>--}}
                <h6  for="" class="col-md-3 col-sm-3 ctn-instruction text-md-end text-sm-end mt-1"> OTHER INSTRUCTION 其它说明：</h6>
                <div class="col-md-7 col-sm-7">
                    <input class="form-control ctn-instruction-value mt-1" type="text" id="ctn_instruction" value="{{$carton_order->ctn_instruction}}" >
                </div>

            </div>

        </div>


    </div>
</div>
