@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Employee List</h5>

                        <div>
                            @can('create',\App\Models\Employee::class)
                                <a href="{{route('employees.create')}}"
                                   class="btn btn-outline-success float-right">
                                    Add Employee </a>
                            @endcan
                        </div>

                    </div>

                    <div class="card-body">

                        <table class="table">


                            @forelse($employees as $key => $employee)

                                @if($key ==0)
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Job</th>
                                        <th scope="col">Building</th>
                                        @can('update', $employee)
                                            @can('delete', $employee)
                                                <th scope="col">Option</th>
                                            @endcan
                                        @endcan
                                    </tr>
                                    </thead>
                                    <tbody>
                                @endif

                                <tr>
                                    <th scope="row">
                                        @can('view',$employee)
                                        <a href="{{route('employees.show', $employee->id)}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            {{$employee->id}} </a>
                                        @endcan
                                        @cannot('view',$employee)
                                            {{$employee->id}}
                                            @endcannot
                                    </th>
                                    <td scope="row">
                                        @if(!is_null($employee->user_account_id))
                                            <i class="fa fa-key"
                                               style="color:greenyellow;"
                                               aria-hidden="true"></i>
                                        @endif
                                        {{$employee->name}}
                                    </td>
                                    <td scope="row">{{$employee->job->job}}</td>
                                    <td scope="row">{{$employee->building->building}}</td>
                                    @can('update', $employee)
                                        @can('delete', $employee)
                                            <td scope="row">
                                                <a style="text-decoration: none;color:darkorange;" href="{{route('employees.edit', $employee->id)}}" >
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>

                                                <form style="display:inline;" action="{{route('employees.destroy', $employee->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border: none;background-color: white;color:darkred;"
                                                            onclick="return confirm('Are you sure to delete?')" >
                                                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>

                                            </td>
                                        @endcan
                                    @endcan
                                </tr>
                            @empty
                                <p class="text-danger">No Employee</p>
                            @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
