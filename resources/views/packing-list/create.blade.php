@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 id="pl_create_title" class="mt-2">Create Packing List</h5>

                        <div>

                            <a href="{{route('packing-lists.index')}}"
                               class="btn btn-outline-secondary">
                                Back</a>


                        </div>

                    </div>

                    <div class="card-body">


                        <div class="row pl_create_select_brand">
                            <div id="div_btn_brand_dickies_eq"  style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">DICKIES-EQUIPMENT</h6>
                            </div>
                            <div id="div_btn_brand_dickies_app"  style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">DICKIES-APPAREL</h6>
                            </div>
                            <div id="div_btn_brand_vans_eq" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">VANS-EQUIPMENT</h6>
                            </div>

                            <div id="div_btn_brand_vans_app" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">VANS-APPAREL</h6>
                            </div>
                            <div id="div_btn_brand_tnf_eq" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">TNF-EQUIPMENT</h6>
                            </div>
                            <div id="div_btn_brand_tnf_app" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">TNF-APPAREL</h6>
                            </div>

                            <div id="div_btn_brand_eastpak_eq" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">EASTPAK-EQUIPMENT</h6>
                            </div>
                            <div id="div_btn_brand_napapijri_app" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">NAPAPIJRI-APPAREL</h6>
                            </div>
                            <div id="div_btn_brand_jansport_eq" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">JANSPORT-EQUIPMENT</h6>
                            </div>
                            <div id="" style="min-height: 50px;" class="col-md-6 ">

                            </div>
                            <div id="div_btn_brand_kipling_eq" style="min-height: 50px;" class="col-md-6 div_btn_brand">
                                <h6 class="text-center mt-2">KIPLING-EQUIPMENT</h6>
                            </div>








                        </div>



                        <div id="pl_create_drop_zone">
                            <form action="{{route('packing-lists.import')}}" method="post" enctype="multipart/form-data"
                                  class="dropzone dz-clickable mt-2" id="packinglist-one">
                                @csrf

                                <div>

                                    <h4 class="text-center"> Check Column Alignment</h4>

                                </div>

                                <div class="dz-default dz-message">

                                    <h1> DROP here or CLICK&CHOOSE your PSR</h1>
                                </div>
                                <h4 class="text-center"> check the excel extension (xlsx,xl,xls)</h4>

                                <input id="pl_create_brand" type="hidden" name="brandntype" >

                            </form>
                        </div>

                        <div id="div_btn_brand_choose" style="min-height: 50px;background-color: #d1d2d4;" class="div_btn_brand">
                            <p class="text-primary text-center"> Choose Brand</p>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection

