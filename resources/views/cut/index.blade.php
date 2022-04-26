@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Cut List</h5>

                        <div>

                                <a href="{{route('cuts.create')}}"
                                   class="btn btn-outline-success float-right">
                                    Add Cut </a>

                        </div>

                    </div>

                    <div class="card-body">

                        @foreach($cuts as $cut)

                            @foreach($cut->employees as $employee)
                                {{$employee->name}} as {{dump($employee->job->job)}}</p>
                            @endforeach


                        @endforeach

                        <table class="table">
                            <tr>

                            </tr>
                            <tr>

                            </tr>


                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
