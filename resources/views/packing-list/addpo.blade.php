<div class="card">
    <div class="card-header">
        <h5> Add PO </h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input id="pl_add_po_country" type="hidden" value="{{$packinglists[0]['pl_country']}}">
            <input id="pl_add_po_crd" type="hidden" value="{{$packinglists[0]['pl_crd']}}">
            <input id="pl_add_po_batch" type="hidden" value="{{$packinglists[0]['pl_batch']}}">
            <input id="pl_add_po_number_batch" type="hidden" value="{{$packinglists[0]['pl_number_batch']}}">
            <input id="pl_add_po_type" type="hidden" value="{{$packinglists[0]['pl_type']}}">
            <input id="pl_add_po_brand" type="hidden" value="{{$packinglists[0]['pl_brand']}}">
            <input id="pl_add_po_user" type="hidden" value="{{auth()->user()->id}}">

            <div class="col-md-6">
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end"> PO </label>
                    <div class="col-md-6 ">
                        <input type="number" class="form-control"
                               id="pl_add_po_po"  placeholder="Enter PO">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end"> Master PO </label>
                    <div class="col-md-6 ">
                        <input type="number" class="form-control"
                               id="pl_add_po_master_po"  placeholder="Enter Master PO">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end"> Factory PO </label>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control"
                               id="pl_add_po_factory_po"  placeholder="Enter Factory PO">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end"> Style </label>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control"
                               id="pl_add_po_style"  placeholder="Enter Style">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end"> Material </label>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control"
                               id="pl_add_po_material"  placeholder="Enter Material">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end"> Prepack </label>
                    <div class="col-md-6 ">
                        <input type="number" class="form-control"
                               id="pl_add_po_prepack"  placeholder="Enter Prepack">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">Description </label>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control"
                               id="pl_add_po_description"  placeholder="Enter Description">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">Color </label>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control"
                               id="pl_add_po_color"  placeholder="Enter Color">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">Size</label>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control"
                               id="pl_add_po_size"  placeholder="Enter Size">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">Quantity </label>
                    <div class="col-md-6 ">
                        <input type="number" class="form-control"
                               id="pl_add_po_quantity"  placeholder="Enter Quantity">
                    </div>
                </div>

                <button id="pl_add_po_btn"  class="btn btn-primary form-control">Add</button>

            </div>

        </div>
    </div>
</div>
