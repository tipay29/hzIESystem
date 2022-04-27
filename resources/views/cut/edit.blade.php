{{--{{dd(auth()->user()->employee->building->building)}}--}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Edit Cut</h5>

                        <div>

                            {{--                            <a href="{{route('cuts.create')}}"--}}
                            {{--                               class="btn btn-outline-success float-right">--}}
                            {{--                                Add Cut </a>--}}

                            {{--                            put left button here--}}

                        </div>

                    </div>

                    <div class="card-body">


                        <form  id="cutForm" action="{{route('cuts.update', $cut->id)}}" method="post">

                            @method('PATCH')

                            @include('cut.form')

                            @csrf

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mt-5">Update Cut</button>

                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
