<div class="card-header ">
    <div class="row mb-1 mt-1">
        <div class="col-md-4">
            <img src="{{ asset('storage/images/horizonlogoword.png') }}" width="140" height="55" alt="Horizon Outdoor">
        </div>
        <div class="col-md-4">
            <h5 class="text-center">Horizon Cambodia Purchase Order</h5>
            <h5 class="text-center">宏盛柬埔寨采购单</h5>
        </div>
        <div class="col-md-4 ">
            <a href="{{url()->previous()}}" style="float:right;"
               class="btn btn-outline-secondary">
                Back</a>
            <a href="#" style="float:right;margin-right:5px;"
               class="btn btn-outline-success" id="ctn_btn_confirm" >
                Confirm</a>
        </div>
    </div>


    <div class="row bg-white pt-2 " id="row-carton-header">
        <div class="col-md-4">

            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Bill# 采购单号:</h6>

                <h6 for="" class="col-md-9 text-md-start text-un" id="ctn_bill_code">
                    HPO-@if($cartonorders->first()['ctn_type'] == "APPAREL")
                            AP
                        @else
EQ
                        @endif
                    -{{substr(date('Y'),-2) . date('m')}}-
                                        {{sprintf("%04d", (\App\Models\CartonOrder::max('id'))+1)
                                        }}
                </h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Bill To 采购方:</h6>

                <h6 for="" class="col-md-9 text-md-start"> HORIZON OUTDOOR (CAMBODIA) CO., LTD.</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Phoum Psar Trach, National road  NO.5,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Khum LoungVek, Srok Kompong Trach,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Kompong Chhnang Province,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Cambodia</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> ATTN 联系人:</h6>

                <h6 for="" class="col-md-9 text-md-start"> {{auth()->user()->name}}</h6>
                <input type="hidden" value="{{auth()->user()->id}}" id="user_id">

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> TEL 电话:</h6>

                <h6 for="" class="col-md-9 text-md-start"> {{auth()->user()->employee->phone}}</h6>

            </div>

            <div class="row">
                <h6 for="" class="col-md-3 text-md-end">E-mail 邮箱:</h6>

                <h6 for="" class="col-md-9 text-md-start">{{auth()->user()->email}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Remark备注:</h6>

                <h6 for="" class="col-md-9 text-md-start"> VAT100186432</h6>

            </div>

        </div>

{{--        MIDDLE--}}


        <div class="col-md-4" style="" >



            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Order Date 下单日:</h6>

                <h6 for="" class="col-md-9 text-md-start" id="ctn_order_date">     {{date('Y-m-d')}}</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Supplier 供应方:</h6>

                <select class="col-md-9 text-md-start" name="supplier_id" id="supplier_id"
                style="border: none;text-decoration: underline;">
                    <option value="1"> 永成包装（柬埔寨）有限公司</option>
                    <option value="2">柬华纸箱（柬埔寨）有限公司 </option>
                    <option value="3">东鑫纸业装饰品(柬埔寨)有限公司 </option>
                </select>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_name_en"> WING CHENG PACKAGING CO.,LTD</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_address_one"> National Road $, Tumnup Kop SROV Road</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_address_two"> Phum Chung Rouk, Sangkat Trapeang Krasang, </h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_address_three"> Khan Por Senchey, Phnom Penh, Cambodia</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end" > ATTN 联系人:</h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_attn"> 唐雪艳</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> TEL 电话:</h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_phone"> 0887937999  /  092786688</h6>

            </div>

            <div class="row">
                <h6 for="" class="col-md-3 text-md-end">E-mail 邮箱:</h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_email">wingchengxueyan@gmail.com; wingcheng6688@gmail.com</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Remark备注:</h6>

                <h6 for="" class="col-md-9 text-md-start" id="h6_supplier_remark"> VATL2021060941</h6>

            </div>


        </div>

        <div class="col-md-4" >

            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Delivery Date 交期:</h6>

                <h6 for="" class="col-md-9 text-md-start" id="ctn_delivery_date">  {{date('Y-m-d', strtotime('+7 days'))}}   </h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Delivery To 送至:</h6>

                <h6 for="" class="col-md-9 text-md-start"> 宏盛柬埔寨-7厂仓库</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Phoum Psar Trach，National road  NO.5,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Khum LoungVek, Srok Kompong Trach,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Kompong Chhnang Province,</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"></h6>

                <h6 for="" class="col-md-9 text-md-start"> Cambodia</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> ATTN 联系人:</h6>

                <h6 for="" class="col-md-9 text-md-start"> YU Yang</h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> TEL 电话:</h6>

                <h6 for="" class="col-md-9 text-md-start"> +855 011 58 79 33</h6>

            </div>

            <div class="row">
                <h6 for="" class="col-md-3 text-md-end">E-mail 邮箱:</h6>

                <h6 for="" class="col-md-9 text-md-start"></h6>

            </div>
            <div class="row">
                <h6 for="" class="col-md-3 text-md-end"> Remark备注:</h6>

                <h6 for="" class="col-md-9 text-md-start"> </h6>

            </div>



        </div>
    </div>

    <div class="row bg-white">
        <div class="col-md-12">
            <div class="row">

                <h6 for="" class="col-md-3 text-md-end pt-2"> OTHER INSTRUCTION 其它说明：</h6>
                <div class="col-md-7">
                    <input class="form-control" type="text" id="ctn_instruction">
                </div>

            </div>

        </div>


    </div>
</div>
