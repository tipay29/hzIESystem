
    <div class="container-fluid p-0 section-pl-to-no-print">
        <div class="row">
            <div class="col-md-2">
                <small for="pls_po">PO</small>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input id="plsort_po" type="radio"
                                   value="1" name="plsort_po" class="form-check"
                                   {{request('plsort_po') == 1 ? 'checked' : ''}}>↑
                            <input id="plsort_po" type="radio"
                                   value="2" name="plsort_po" class="form-check"
                                   {{request('plsort_po') == 2 ? 'checked' : ''}}>↓
                        </div>
                    </div>
                    <input id="pls_po" type="text" class="form-control"
                           value="{{request('pls_po')}}" name="pls_po">

                </div>



            </div>
            <div class="col-md-2">
                <small for="pls_master_po">Master PO</small>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input id="plsort_master_po" type="radio"
                                   value="1" name="plsort_master_po" class="form-check"
                                   {{request('plsort_master_po') == 1 ? 'checked' : ''}}>↑
                            <input id="plsort_master_po" type="radio"
                                   value="2" name="plsort_master_po" class="form-check"
                                   {{request('plsort_master_po') == 2 ? 'checked' : ''}}>↓
                        </div>
                    </div>
                    <input id="pls_master_po" type="text" class="form-control"
                           value="{{request('pls_master_po')}}" name="pls_master_po">
                </div>
            </div>
            <div class="col-md-2">
                <small for="pls_factory_po">Factory PO</small>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input id="plsort_factory_po" type="radio"
                                   value="1" name="plsort_factory_po" class="form-check"
                                   {{request('plsort_factory_po') == 1 ? 'checked' : ''}}>↑
                            <input id="plsort_factory_po" type="radio"
                                   value="2" name="plsort_factory_po" class="form-check"
                                   {{request('plsort_factory_po') == 2 ? 'checked' : ''}}>↓
                        </div>
                    </div>
                    <input id="pls_factory_po" type="text" class="form-control"
                           value="{{request('pls_factory_po')}}" name="pls_factory_po">
                </div>
            </div>
            <div class="col-md-2">

                <small for="pls_material">Material</small>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input id="plsort_material" type="radio"
                                   value="1" name="plsort_material" class="form-check"
                                   {{request('plsort_material') == 1 ? 'checked' : ''}}>↑
                            <input id="plsort_material" type="radio"
                                   value="2" name="plsort_material" class="form-check"
                                   {{request('plsort_material') == 2 ? 'checked' : ''}}>↓
                        </div>
                    </div>
                    <input id="pls_material" type="text" class="form-control"
                           value="{{request('pls_material')}}" name="pls_material">
                </div>

            </div>

            <div class="col-md-2">
                <small for="pls_status">Status</small>

                <select name="pls_status" id="pls_status" class="form-control">
                    <option value="0" selected disabled>Select Status</option>
                    <option value="Draft" {{request('pls_status') == "Draft" ? "selected" : ""}}>Draft</option>
                    <option value="Cancelled" {{request('pls_status') == "Cancelled" ? "selected" : ""}}>Cancelled</option>
                    <option value="Final" {{request('pls_status') == "Final" ? "selected" : ""}}>Final</option>
                </select>
            </div>
            <div class="col-md-2">
                <small for="pls_customer_name">Customer Name</small>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input id="plsort_customer_name" type="radio"
                                   value="1" name="plsort_customer_name" class="form-check"
                                   {{request('plsort_customer_name') == 1 ? 'checked' : ''}}>↑
                            <input id="plsort_customer_name" type="radio"
                                   value="2" name="plsort_customer_name" class="form-check"
                                   {{request('plsort_customer_name') == 2 ? 'checked' : ''}}>↓
                        </div>
                    </div>
                    <input id="pls_customer_name" type="text" class="form-control"
                           value="{{request('pls_customer_name')}}" name="pls_customer_name">
                </div>
            </div>

        </div>
        <div class="row mt-1">
            <div class="col-md-2">
                <small for="pls_user">Created By</small>
                <select name="pls_user" id="pls_user" class="form-control">
                    <option value="0" selected disabled>Select User</option>
                    <option value="30" {{request('pls_user') == "30" ? "selected" : ""}}>William</option>
                    <option value="12" {{request('pls_user') == "12" ? "selected" : ""}}>Christian</option>
                    <option value="14" {{request('pls_user') == "14" ? "selected" : ""}}>Raksa</option>
                    <option value="16" {{request('pls_user') == "16" ? "selected" : ""}}>Jevon</option>
                    <option value="19" {{request('pls_user') == "19" ? "selected" : ""}}>Bert</option>
                    <option value="20" {{request('pls_user') == "20" ? "selected" : ""}}>Franklin</option>
                    <option value="21" {{request('pls_user') == "21" ? "selected" : ""}}>Vinus</option>
                    <option value="23" {{request('pls_user') == "23" ? "selected" : ""}}>Jayson</option>
                </select>
            </div>

            <div class="col-md-2">
                <small for="pls_crd_one">CRD1</small>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input id="plsort_crd" type="radio"
                                   value="1" name="plsort_crd" class="form-check"
                                   {{request('plsort_crd') == 1 ? 'checked' : ''}}>↑
                            <input id="plsort_crd" type="radio"
                                   value="2" name="plsort_crd" class="form-check"
                                   {{request('plsort_crd') == 2 ? 'checked' : ''}}>↓
                        </div>
                    </div>
                    <input id="pls_crd_one" type="date" class="form-control"
                           value="{{request('pls_crd_one')}}" name="pls_crd_one">
                </div>
            </div>

            <div class="col-md-2">
                <small for="pls_crd_two">CRD2</small>
                <input id="pls_crd_two" type="date" class="form-control"
                       value="{{request('pls_crd_two')}}" name="pls_crd_two">
            </div>

            <div class="col-md-2">
                <small for="pls_date_created">Date Created</small>

                <input id="pls_datecreated" type="date" class="form-control"
                       value="{{request('pls_date_created')}}" name="pls_date_created">
            </div>

            <div class="col-md-2">
                <small for="pls_buy_month" >Buy Month</small>
                <select name="pls_buy_month" id="pls_buy_month" class="form-control">
                    <option value="0" selected disabled>Select Month</option>
                    <option value="JAN" {{request('pls_buy_month') == "JAN" ? "selected" : ""}}>January</option>
                    <option value="FEB" {{request('pls_buy_month') == "FEB" ? "selected" : ""}}>February</option>
                    <option value="MAR" {{request('pls_buy_month') == "MAR" ? "selected" : ""}}>March</option>
                    <option value="APR" {{request('pls_buy_month') == "APR" ? "selected" : ""}}>April</option>
                    <option value="MAY" {{request('pls_buy_month') == "MAY" ? "selected" : ""}}>May</option>
                    <option value="JUN" {{request('pls_buy_month') == "JUN" ? "selected" : ""}}>June</option>
                    <option value="JUL" {{request('pls_buy_month') == "JUL" ? "selected" : ""}}>July</option>
                    <option value="AUG" {{request('pls_buy_month') == "AUG" ? "selected" : ""}}>August</option>
                    <option value="SEP" {{request('pls_buy_month') == "SEP" ? "selected" : ""}}>September</option>
                    <option value="OCT" {{request('pls_buy_month') == "OCT" ? "selected" : ""}}>October</option>
                    <option value="NOV" {{request('pls_buy_month') == "NOV" ? "selected" : ""}}>November</option>
                    <option value="DEC" {{request('pls_buy_month') == "DEC" ? "selected" : ""}}>December</option>
                </select>
            </div>

            <div class="col-md-2">
                <small for="pls_date_created">Buy Year</small>

                <select name="pls_buy_year" id="pls_buy_year" class="form-control">
                    <option value="0" selected disabled>Select Year</option>
                    <option value="2020" {{request('pls_buy_year') == "2020" ? "selected" : ""}}>2020</option>
                    <option value="2021" {{request('pls_buy_year') == "2021" ? "selected" : ""}}>2021</option>
                    <option value="2022" {{request('pls_buy_year') == "2022" ? "selected" : ""}}>2022</option>
                    <option value="2023" {{request('pls_buy_year') == "2023" ? "selected" : ""}}>2023</option>
                    <option value="2024" {{request('pls_buy_year') == "2024" ? "selected" : ""}}>2024</option>
                    <option value="2025" {{request('pls_buy_year') == "2025" ? "selected" : ""}}>2025</option>
                </select>
            </div>

        </div>

    </div>


    <div class="row mt-2">
        <div class="col-md-2">

            <small for="pls_brand">Brand</small>

            <select name="pls_brand" id="pls_brand" class="form-control">
                <option value="0" selected disabled>Select Brand</option>
                <option value="ADVANTUS" {{request('pls_brand') == "ADVANTUS" ? "selected" : ""}}>ADVANTUS</option>
                <option value="DICKIES" {{request('pls_brand') == "DICKIES" ? "selected" : ""}}>DICKIES</option>
                <option value="EASTPAK" {{request('pls_brand') == "EASTPAK" ? "selected" : ""}}>EASTPAK</option>
                <option value="JANSPORT" {{request('pls_brand') == "JANSPORT" ? "selected" : ""}}>JANSPORT</option>
                <option value="NAPAPIJRI" {{request('pls_brand') == "NAPAPIJRI" ? "selected" : ""}}>NAPAPIJRI</option>
                <option value="TNF" {{request('pls_brand') == "TNF" ? "selected" : ""}}>TNF</option>
                <option value="VANS" {{request('pls_brand') == "VANS" ? "selected" : ""}}>VANS</option>
            </select>

        </div>
        <div class="col-md-2">

            <small for="pls_type">Type</small>

            <select name="pls_type" id="pls_type" class="form-control">
                <option value="0" selected disabled>Select Type</option>
                <option value="APPAREL" {{request('pls_type') == "APPAREL" ? "selected" : ""}}>APPAREL</option>
                <option value="EQUIPMENT" {{request('pls_type') == "EQUIPMENT" ? "selected" : ""}}>EQUIPMENT</option>
            </select>

        </div>
        <div class="col-md-2"></div>
        <div  class="col-md-2">
            <div id="batch_version">
                <small for="pls_version">Version</small>

                <select name="pls_version" id="pls_version" class="form-control">
                    <option value="0" selected disabled>Select Version</option>
                    <option value="1" >PL ver 1</option>
                    <option value="2" >PL ver 2</option>
                    <option value="3" >PL ver 3</option>
                </select>
            </div>

        </div>
        <div class="col-md-2">
            <button id="pls_batch_btn_clear" style="height: 100%;" class="btn form-control btn-primary">
                {{__('text.Clear')}}</button>
        </div>
        <div class="col-md-2">
            <button id="pls_btn_apply" style="height: 100%;" class="btn form-control btn-primary">
                {{__('text.Search')}}</button>
        </div>

    </div>
</form>

<div class="row">




</div>


