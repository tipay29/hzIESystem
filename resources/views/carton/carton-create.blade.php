@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mb-3 pl_section-to-print">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Carton Order Create</h5>

                        <div>


                            <a href="{{route('packing-lists.index')}}"
                               class="btn btn-outline-secondary">
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="#" method="get">
                            @include('packing-list.batchfilter')

                            <div class="table-responsive">
                                <table class="table" >
                                    <thead>

                                    <tr>

                                    </tr>
                                    </thead>

                                    <tbody>


                                    <tr>

                                    </tr>
                                    </tbody>


                                </table>

                            </div>


                    </div>

                </div>




            </div>
        </div>
    </div>
@endsection

