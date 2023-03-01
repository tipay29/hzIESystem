<!-- Modal -->
<div class="modal fade" id="addSizeModal" tabindex="-1" aria-labelledby="addSizeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addSizeModalLabel">Add Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <input id="style" type="hidden" value="{{$style->id}}">

                <div class="row mb-3">
                    <label for="size" class="col-md-4 col-form-label text-md-end">
                        Size</label>
                    <div class="col-md-7">
                        <input id="size" name='size' type="text" class="form-control"
                               placeholder="Enter size" value="{{old('size')}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="weight" class="col-md-4 col-form-label text-md-end">
                        Weight</label>
                    <div class="col-md-7">
                        <input id="weight" name='weight' type="text" class="form-control"
                               placeholder="Enter weight" value="{{old('weight')}}">

                    </div>
                </div>



                <div class="row mb-3">
                    <label for="carton_id" class="col-md-4 col-form-label text-md-end">
                        Carton</label>


                    <div class="col-md-7">
                        <select id="carton_id" class="form-control" name="carton_id" >
                            <option disabled selected>Select Carton</option>

                            @foreach($cartons as $carton)
                                <option value="{{$carton->id}}">
                                    {{$carton->brand->brand_name . " " . $carton->type ." " . $carton->ctn_size}}
                                </option>
                            @endforeach

                        </select>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="weight" class="col-md-4 col-form-label text-md-end">
                        MCQ</label>
                    <div class="col-md-7">
                        <input id="mcq" name='mcq' type="text" class="form-control"
                               placeholder="Enter mcq" value="{{old('mcq')}}">

                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" id="btn_save_size">Save Size</button>
                </div>



            </div>
        </div>
    </div>
</div>
