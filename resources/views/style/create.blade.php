@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Style</h5>

                        <div>

{{--                            <a href="{{route('purchase-orders.create')}}"--}}
{{--                               class="btn btn-outline-success float-right">--}}
{{--                                Add Purchase Order </a>--}}

                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{route('styles.store')}}" method="post">

                            @include('style.form')

                            @csrf
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save Style</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>


    </div>

@endsection
