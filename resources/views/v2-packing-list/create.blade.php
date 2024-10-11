@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 id="v2_pl_create_title" class="mt-2">Create Packing List v2</h5>

                        <div>

                            <a href="{{ asset('storage/files/UploadFile.xlsx') }}" download
                               style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                                border: 2px solid darkgrey;"

                            >Download Sample Upload </a>

                            <a href="{{route('v2-packing-lists.index')}}"
                               class="btn btn-outline-success section-to-no-print">
                                Lists</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>


                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row v2_pl_create_select_brand">
                            <div id="v2_pl_div_btn_brand_jw_app"  style="min-height: 50px;" class="col-md-12 div_btn_brand">
                                <h6 class="text-center mt-2">JACKWOLFSKIN</h6>
                            </div>
                            <div id="v2_pl_div_btn_brand_zr_app"  style="min-height: 50px;" class="col-md-12 div_btn_brand">
                                <h6 class="text-center mt-2">ZARA</h6>
                            </div>
                            <div id="v2_pl_div_btn_brand_zc_app"  style="min-height: 50px;" class="col-md-12 div_btn_brand">
                                <h6 class="text-center mt-2">ZAVETTI CANADA</h6>
                            </div>
                            <div id="v2_pl_div_btn_brand_mr_app"  style="min-height: 50px;" class="col-md-12 div_btn_brand">
                                <h6 class="text-center mt-2">MONTERRAIN</h6>
                            </div>
                        </div>

                        <div id="v2_pl_create_drop_zone">
                            <form action="{{route('v2-packing-lists.import')}}" method="post" enctype="multipart/form-data"
                                  class="dropzone dz-clickable mt-2" id="packinglist-two">
                                @csrf

                                <div>
                                    <h4 class="text-center"> Check Column Alignment</h4>
                                </div>

                                <div class="dz-default dz-message">
                                    <h1> DROP here or CLICK&CHOOSE your PSR</h1>
                                </div>
                                <h4 class="text-center"> check the excel extension (xlsx,xl,xls)</h4>

                                <input id="v2_pl_create_brand" type="hidden" name="brandntype" >
                            </form>
                        </div>

                        <div id="v2_pl_div_btn_brand_choose" style="min-height: 50px;background-color: #d1d2d4;" class="div_btn_brand">
                            <p class="text-primary text-center"> Choose Brand</p>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection

