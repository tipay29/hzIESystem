@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 ">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-end">Employee ID</label>
                            <div class="col-md-6 " >
                                <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror"
                                        id="emp_id" autofocus>
                                    <option disabled selected>Please select your ID</option>
                                    @foreach($employees as $employee)

                                        @if(is_null($employee->user_account_id))
                                            <option value="{{$employee->id}}"
                                                {{$employee->id == old('employee_id') ? 'selected' : ''}}>
                                            {{$employee->id}}</option>
                                        @else
                                            <option value=""></option>
                                        @endif
                                    @endforeach

                                </select>

                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 " >
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}*</label>

                            <div class="col-md-6">
                                <input id="emp_name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="Enter Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}*</label>

                            <div class="col-md-6">
                                <input id="emp_email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Enter Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password"
                                       >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                       required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
