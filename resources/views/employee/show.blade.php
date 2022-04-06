@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Employee {{$employee->id}}  Details</h5>


                        <div>

                            @can('update',$employee)
                            <a href="{{route('employees.edit', $employee->id)}}"
                               class="btn btn-outline-warning">
                                Edit Employee </a>
                            @endcan
                            @can('delete', $employee)
                            <form style="display:inline;" action="{{route('employees.destroy', $employee->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')" >Delete Employee</button>
                            </form>
                                @endcan
                        </div>


                    </div>

                    <div class="card-body">
                        <strong>Name</strong> <p>{{$employee->name}}</p>
                        <strong>Phone</strong> <p>{{$employee->phone}}</p>
                        <strong>Job</strong> <p>{{$employee->job->job}}</p>
                        <strong>Building</strong> <p>{{$employee->building->building}}</p>
                        <strong>Address</strong>
                        @if($employee->address)
                            <p>{{$employee->address}}</p>
                        @else
                            <p>-</p>
                        @endif
                        <strong>Birthday</strong>
                        @if($employee->birthday)
                            <p>{{$employee->birthday}}</p>
                        @else
                            <p>-</p>
                        @endif

                        <strong>Join Date</strong>
                        @if($employee->join_date)
                            <p>{{$employee->join_date}}</p>
                        @else
                            <p>-</p>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
