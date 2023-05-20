<!-- Modal -->
<div class="modal fade" id="cartonOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Carton Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('cartons.order-create')}}" method="get">
            <div class="modal-body">
                <div class="row">



                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label for="co_brand" class="col-md-4 col-form-label text-md-end">Brand</label>

                            <div class="col-md-6">
                                <select id="co_brand" name="co_brand" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Brand</option>
                                    <option value="ADVANTUS">ADVANTUS</option>
                                    <option value="DICKIES">DICKIES</option>
                                    <option value="EASTPAK">EASTPAK</option>
                                    <option value="JANSPORT">JANSPORT</option>
                                    <option value="KIPLING">KIPLING</option>
                                    <option selected value="NAPAPIJRI">NAPAPIJRI</option>
                                    <option value="TNF">TNF</option>
                                    <option value="VANS">VANS</option>
                                </select>

                                @error('co_brand')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label for="co_type" class="col-md-4 col-form-label text-md-end">Type</label>

                            <div class="col-md-6">
                                <select id="co_type" name="co_type" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Type</option>
                                    <option selected value="APPAREL">APPAREL</option>
                                    <option value="EQUIPMENT">EQUIPMENT</option>
                                </select>

                                @error('co_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label for="co_year" class="col-md-4 col-form-label text-md-end">Year</label>

                            <div class="col-md-6">
                                <select id="co_year" name="co_year" class="form-select" aria-label="Default select example">
                                    <option disabled>Select Year</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022" selected>2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>

                                @error('co_year')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label for="co_month" class="col-md-4 col-form-label text-md-end">Month</label>

                            <div class="col-md-6">
                                <select id="co_month" name="co_month" class="form-select" aria-label="Default select example">
                                    <option disabled>Select Month</option>
                                    <option value="JAN">January</option>
                                    <option value="FEB">February</option>
                                    <option value="MAR">March</option>
                                    <option value="APR">April</option>
                                    <option selected value="MAY">May</option>
                                    <option value="JUN">June</option>
                                    <option value="JUL">July</option>
                                    <option value="AUG">August</option>
                                    <option value="SEP">September</option>
                                    <option value="OCT">October</option>
                                    <option value="NOV">November</option>
                                    <option value="DEC">December</option>
                                </select>

                                @error('co_month')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input id="co_create" type="submit" class="btn btn-primary">


            </div>
                @csrf
            </form>
        </div>
    </div>
</div>
