@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Purchase Order List</h5>

                        <div>

                            <a href="{{route('purchase-orders.create')}}"
                               class="btn btn-outline-success float-right">
                                Add Purchase Order </a>

                        </div>

                    </div>

                    <div class="card-body">

                        <table class="table">




                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
