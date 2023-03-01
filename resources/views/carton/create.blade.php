@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Carton</h5>

                        <div>




                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-success"
                            > Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{route('cartons.store')}}" method="post">

                            @include('carton.form')

                            @csrf
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">{{__('text.Save') . ' ' . 'Carton'}} </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

