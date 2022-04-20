
                            <!-- Modal HTML -->
        <div id="fabric_color_add_modal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">Add Fabric Color</h5>
                                        <button id="btn-close-fabric-color-modal" type="button"
                                                class="btn-close" aria-label="Close"></button>
                                </div>

                            <form  >

                                <div class="modal-body">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="fabric_color" class="col-md-4 col-form-label text-md-end">Fabric Color</label>
                                        <div class="col-md-7">

                                            <input id="fabric_color_modal" type="text" class="form-control"
                                                   placeholder="Enter fabric color">

                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer ">

                                        <button id="btn-save-fabric-color-modal" class="btn btn-primary">Save Fabric Color</button>
                                </div>

                            </form>

                            </div>
                    </div>
            </div>
