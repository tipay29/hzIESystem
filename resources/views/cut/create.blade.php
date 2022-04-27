{{--{{dd(auth()->user()->employee->building->building)}}--}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Cut</h5>

                        <div>

{{--                            <a href="{{route('cuts.create')}}"--}}
{{--                               class="btn btn-outline-success float-right">--}}
{{--                                Add Cut </a>--}}

{{--                            put left button here--}}

                        </div>

                    </div>

                        <div class="card-body">


                            <form  id="cutForm" action="{{route('cuts.store')}}" method="post">


                                @include('cut.form')

                                @csrf

                                  <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mt-5">Save Cut</button>

                                  </div>

                            </form>


                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
