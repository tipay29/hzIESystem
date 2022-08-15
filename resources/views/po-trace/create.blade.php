

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        PO Trace Create

                    </div>

                    <div class="card-body ">

                        <form action="{{route('po-traces.store')}}" method="post" enctype="multipart/form-data"
                              class="dropzone dz-clickable" id="trace-one">
                            @csrf
                            <div>
                                <h3 class="text-center">Upload Image By Click On Box</h3>
                            </div>
                            <div class="dz-default dz-message"> <span> Drop file here to upload </span> </div>


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
