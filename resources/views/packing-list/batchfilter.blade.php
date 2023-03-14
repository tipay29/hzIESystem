@if(session()->has('message'))
<div class="alert alert-danger">
    {{ session()->get('message') }}
</div>
@endif
<form action="{{route('packing-lists.batch', $packinglists[0]->pl_batch)}}" method="get">
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
                <input id="pls_status" type="text" class="form-control"
                       value="{{request('pls_status')}}"  name="pls_status">
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
                <input maxlength="1" id="pls_user" type="text" class="form-control"
                       value="{{request('pls_user')}}" name="pls_user">
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
                <button id="pls_batch_btn_clear" style="height: 100%;" class="btn form-control btn-primary">
                    {{__('text.Clear')}}</button>
            </div>
            <div class="col-md-2">
                <button id="pls_btn_apply" style="height: 100%;" class="btn form-control btn-primary">
                    {{__('text.Search')}}</button>
            </div>
        </div>

    </div>
</form>
