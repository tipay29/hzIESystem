@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-2">{{__('text.Edit') . ' '. __('text.Employee')}}</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('employees.update', $employee->id)}}">
                            @csrf
                            @method('PATCH')

                            @include('employee.form')



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('text.Update') . ' '. __('text.Employee')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
