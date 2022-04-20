
                            <!-- Modal HTML -->
        <div id="fabric_code_add_modal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                        <div class="modal-content">

                                <div class="modal-header">
                                        <h5 class="modal-title">Add Fabric Code</h5>
                                        <button id="btn-close-fabric-code-modal" type="button" class="btn-close" aria-label="Close"></button>
                                </div>

                            <form  >

                                <div class="modal-body">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="fabric_color" class="col-md-4 col-form-label text-md-end">Fabric Code</label>
                                        <div class="col-md-7">

                                            <input id="fabric_code_modal" type="text" class="form-control"
                                                   placeholder="Enter fabric code">

                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">

                                        <button id="btn-save-fabric-code-modal" type="button" class="btn btn-primary">Save Fabric Code</button>
                                </div>

                            </form>
                            </div>
                    </div>
            </div>


