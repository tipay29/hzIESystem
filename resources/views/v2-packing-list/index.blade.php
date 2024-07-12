@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing Lists v2</h5>

                        <div>

                            <a href="{{route('v2-packing-lists.create')}}"
                               class="btn btn-outline-success">
                                Create PL</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">



                    </div>

                </div>

            </div>

        </div>

    </div>




@endsection

