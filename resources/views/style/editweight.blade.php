@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Edit')}} Weight Upload</h5>

                        <div>

                            {{--                            <a href="{{route('purchase-orders.create')}}"--}}
                            {{--                               class="btn btn-outline-success float-right">--}}
                            {{--                                Add Purchase Order </a>--}}

                        </div>

                        <a href="{{ asset('storage/files/UploadFile.xlsx') }}" download
                           style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                                border: 2px solid darkgrey;"

                        >Download Sample Upload </a>

                    </div>

                    <div class="card-body">

                        <form action="{{route('styles.updateweights')}}" method="post" enctype="multipart/form-data"
                              class="dropzone dz-clickable mt-2" id="styles-weight">
                            @csrf

                            <div>


                                <h4 class="text-center"> Please DROP here or CLICK&CHOOSE </h4>
                            </div>

                            <div class="dz-default dz-message">

                                <h1>to Update Style Weights</h1>
                            </div>
                            <h4 class="text-center"> </h4>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>


    </div>

@endsection
