<div class="card">
    <div class="card-header">
        <h5>Edit Packing List</h5>

    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label for="pl_update_qty_input" class="col-md-4 col-form-label text-md-end">PL Key </label>
            <div class="col-md-6 ">
                <div class="input-group">
                    <input id="pl_update_id_input" type="number" class="form-control"
                           placeholder="Display PL Key here" disabled>
                    <div class="input-group-append">
                        <button id="pl_delete_btn" class="btn btn-danger" type="button"
                        >Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="pl_update_qty_input" class="col-md-4 col-form-label text-md-end">Total Quantity </label>
            <div class="col-md-6 ">
                <div class="input-group">
                    <input id="pl_update_qty_input" type="number" class="form-control"
                           placeholder="Enter Quantity">
                    <div class="input-group-append">
                        <button id="pl_update_qty_btn" class="btn btn-success" type="button"
                        >Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="pl_update_nw_input" class="col-md-4 col-form-label text-md-end">Net Weight </label>
            <div class="col-md-6 ">
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
        </div>

        <div class="row mb-3">
            <label for="pl_update_gw_input" class="col-md-4 col-form-label text-md-end">Gross Weight </label>
            <div class="col-md-6 ">
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
