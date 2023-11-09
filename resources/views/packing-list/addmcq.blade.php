
<!-- Modal -->
<div class="modal fade" id="addMcqModal" tabindex="-1" aria-labelledby="addMcqLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">

        <div class="modal-content">
            <div class="modal-header">
{{--                here change--}}
                <h1 class="modal-title fs-5" id="addMcqLabel">Add MCQ <span id="add_mcq_title"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input id="pl_mcq_style_input" type="hidden" class="form-control"
                       placeholder="Enter Style">
                <input id="pl_mcq_style_id_input" type="hidden" class="form-control">

                <div class="row">
                   <div class="col-md-2">
                       <label for="">Size &emsp;&emsp;&nbsp; Qty </label>
                       <div class="input-group">

                           <input
                               id="pl_mcq_size_input" type="text" class="form-control" >
                           <div class="input-group-append">
                               <button id="ata_size_btn" class="btn btn-primary" type="button"
                                       style="padding-left: 1px;padding-right: 1px;" >
                                   <i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
                           </div>
                           <label for="pl_mcq_size_input"  id="pl_mcq_size_lbl_one"
                                  style="position:absolute;
                                top: 8px;
                                left: 80px;
                            "
                           ></label>

                       </div>

                   </div>
                   <div class="col-md-1">
                       <label for="">NetWeight</label>
                       <div class="input-group">
                           <input id="pl_mcq_weight_input"  type="text" class="form-control" >
                           <div class="input-group-append">
                               <button id="ata_nw_btn" class="btn btn-primary" type="button"
                               style="padding-left: 1px;padding-right: 1px;">
                                   <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                               </button>
                           </div>

                       </div>

                   </div>

                   <div class="col-md-2" style="background-color: #C0F5FB;">
                       <label for="" class="d-flex justify-content-between"><span>Carton</span>
                           <span style="font-weight: bold;">
                               1ST SET</span></label>

                       <div class="input-group">
                           <select id="pl_mcq_carton_first_input" class="form-control">
                               <option disabled selected>Select Carton</option>
                           </select>
                           <div class="input-group-append">
                               <button id="ata_carton_btn" class="btn btn-primary" type="button"
                                       style="padding-left: 1px;padding-right: 1px;">
                                   <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                               </button>
                           </div>
                       </div>

                   </div>
                   <div class="col-md-1" style="background-color: #C0F5FB;">
                       <label for="">MCQ</label>
                       <div class="input-group">
                           <input id="pl_mcq_qty_first_input" type="text" class="form-control" >
                           <div class="input-group-append">
                               <button id="ata_mcq_btn" class="btn btn-primary" type="button"
                                       style="padding-left: 1px;padding-right: 1px;">
                                   <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                               </button>
                           </div>
                       </div>
                   </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">
                        <label for="" class="d-flex justify-content-between"><span>Carton</span>
                            <span style="font-weight: bold;">
                               2ND SET</span></label>
                        <div class="input-group">
                            <select id="pl_mcq_carton_second_input" class="form-control">
                                <option disabled selected>Select Carton</option>

                            </select>
                            <div class="input-group-append">
                                <button id="ata_carton_second_btn" class="btn btn-primary" type="button"
                                        style="padding-left: 1px;padding-right: 1px;"
                                >
                                    <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">
                        <label for="">MCQ</label>
                        <div class="input-group">
                            <input id="pl_mcq_qty_second_input" type="text" class="form-control" >
                            <div class="input-group-append">
                                <button id="ata_mcq_second_btn" class="btn btn-primary" type="button"
                                        style="padding-left: 1px;padding-right: 1px;"
                                >
                                    <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">
                        <label for="" class="d-flex justify-content-between"><span>Carton</span>
                            <span style="font-weight: bold;">
                               3RD SET</span></label>
                        <div class="input-group">
                            <select id="pl_mcq_carton_three_input" class="form-control">
                                <option disabled selected>Select Carton</option>

                            </select>
                            <div class="input-group-append">
                                <button id="ata_carton_third_btn" class="btn btn-primary" type="button"
                                        style="padding-left: 1px;padding-right: 1px;"
                                >
                                    <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">
                        <label for="">MCQ</label>
                        <div class="input-group">
                            <input id="pl_mcq_qty_three_input" type="text" class="form-control" >
                            <div class="input-group-append">
                                <button id="ata_mcq_third_btn" class="btn btn-primary" type="button"
                                        style="padding-left: 1px;padding-right: 1px;"
                                >
                                    <i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
                            </div>
                        </div>

                    </div>


               </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_two" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_two" id="pl_mcq_size_lbl_two"
                                   style="position:absolute;
                                    top: 8px;
                                    left: 80px;
                                "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_two"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_two" class="form-control" >
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_two" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_two" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_two" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_two" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_two" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_three" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_three" id="pl_mcq_size_lbl_three"
                                   style="position:absolute;
                                        top: 8px;
                                        left: 80px;
                                    "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_three"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_three" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_three" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_three" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_three" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_three" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_three" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_four" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_four" id="pl_mcq_size_lbl_four"
                                   style="position:absolute;
                                            top: 8px;
                                            left: 80px;
                                        "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_four"  type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_four" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_four" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_four" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_four" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_four" class="form-control">
                            <option disabled selected>Select Carton</option>
                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_four" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_five" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_five" id="pl_mcq_size_lbl_five"
                                   style="position:absolute;
                                                top: 8px;
                                                left: 80px;
                                            "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_five"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_five" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_five" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_five" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_five" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_five" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_five" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_six" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_six" id="pl_mcq_size_lbl_six"
                                   style="position:absolute;
                                                    top: 8px;
                                                    left: 80px;
                                                "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_six"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_six" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_six" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_six" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_six" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_six" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_six" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_seven" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_seven" id="pl_mcq_size_lbl_seven"
                                   style="position:absolute;
                                                        top: 8px;
                                                        left: 80px;
                                                    "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_seven"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_seven" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_seven" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_seven" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_seven" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_seven" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_seven" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_eight" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_eight" id="pl_mcq_size_lbl_eight"
                                   style="position:absolute;
                                                            top: 8px;
                                                            left: 80px;
                                                        "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_eight"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_eight" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_eight" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_eight" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_eight" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_eight" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_eight" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_nine" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_nine" id="pl_mcq_size_lbl_nine"
                                   style="position:absolute;
                                                                top: 8px;
                                                                left: 80px;
                                                            "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_nine"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_nine" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_nine" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_nine" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_nine" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_nine" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">

                        <input id="pl_mcq_qty_three_input_nine" type="text" class="form-control" >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="pl_mcq_size_input_ten" type="text" class="form-control" >
                            <label for="pl_mcq_size_input_ten" id="pl_mcq_size_lbl_ten"
                                   style="position:absolute;
                                                                    top: 8px;
                                                                    left: 80px;
                                                                "
                            ></label>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <input id="pl_mcq_weight_input_ten"  type="text" class="form-control" >
                    </div>
                    <div class="col-md-2" style="background-color: #C0F5FB;">

                        <select id="pl_mcq_carton_first_input_ten" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #C0F5FB;">

                        <input id="pl_mcq_qty_first_input_ten" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #D0FBC0;">

                        <select id="pl_mcq_carton_second_input_ten" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>
                    </div>
                    <div class="col-md-1" style="background-color: #D0FBC0;">

                        <input id="pl_mcq_qty_second_input_ten" type="text" class="form-control" >
                    </div>

                    <div class="col-md-2" style="background-color: #F7FBC0;">

                        <select id="pl_mcq_carton_three_input_ten" class="form-control">
                            <option disabled selected>Select Carton</option>

                        </select>

                    </div>
                    <div class="col-md-1" style="background-color: #F7FBC0;">
                        <input id="pl_mcq_qty_three_input_ten" type="text" class="form-control">
                    </div>

                </div>

                <button class="form-control btn btn-primary mt-3" id="pl_mcq_add_btn">Submit</button>

            </div>

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addMcqLabel">Edit PO</h1>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-md-3">
                        <label for="pl_update_qty_input" class="col-form-label">PL Key </label>
                        <div class="input-group">
                            <input id="pl_update_id_input" type="number" class="form-control"
                                   placeholder="Display PL Key here" disabled>
                            <div class="input-group-append">
                                <button id="pl_delete_btn" class="btn btn-danger" type="button"
                                >Delete</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="pl_update_qty_input" class="col-form-label text-md-end">Total Quantity </label>
                        <div class="input-group">
                            <input id="pl_update_qty_input" type="number" class="form-control"
                                   placeholder="Enter Quantity">
                            <div class="input-group-append">
                                <button id="pl_update_qty_btn" class="btn btn-success" type="button"
                                >Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="pl_update_nw_input" class=" col-form-label text-md-end">Net Weight </label>
                        <div class="input-group">
                            <input id="pl_update_nw_input" type="number" class="form-control"
                                   placeholder="Enter Net Weight">
                            <input type="hidden" id="pl_update_rowcut_input">
                            <div class="input-group-append">
                                <button id="pl_update_nw_btn" class="btn btn-success" type="button"
                                >Update</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="pl_update_gw_input" class="col-form-label text-md-end">Gross Weight </label>
                        <div class="input-group">
                            <input id="pl_update_gw_input" type="number" class="form-control"
                                   placeholder="Enter Gross Weight">
                            <div class="input-group-append">
                                <button id="pl_update_gw_btn" class="btn btn-success" type="button"
                                >Update</button>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>

    </div>
</div>



