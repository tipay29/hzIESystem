<div class="row mb-3">
    <label for="id" class="col-md-4 col-form-label text-md-end">{{__('text.ID')}}*</label>

    <div class="col-md-6">
        <input id="id" type="number" class="form-control @error('id') is-invalid @enderror"
               name="id" value="{{ old('id') ?? $employee->id}}"  autocomplete="id"
               autofocus placeholder="Enter your ID">

        @error('id')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{__('text.Name')}}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" value="{{ old('name') ?? $employee->name }}" autocomplete="name"
               placeholder="Enter your name">

        @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>



<div class="row mb-3">
    <label for="phone" class="col-md-4 col-form-label text-md-end">{{__('text.Phone')}}</label>
    <div class="col-md-6 ">
        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
               name="phone" value="{{ old('phone') ?? $employee->phone }}" autocomplete="phone"
               placeholder="Enter your phone">

        @error('phone')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="job" class="col-md-4 col-form-label text-md-end">{{__('text.Job')}}*</label>
    <div class="col-md-6 ">
        <select name="job_id" class="form-control @error('job_id') is-invalid @enderror"
                id="job">
            <option disabled selected>Please select your job</option>
            @foreach($jobs as $job)
            <option value="{{$job->id}}"
                {{$job->id == old('job_id') ? 'selected' : ($job->id == $employee->job_id ? 'selected' : '')}}>
                {{$job->job}}</option>
            @endforeach
        </select>
        @error('job_id')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>


<div class="row mb-3">
    <label for="building" class="col-md-4 col-form-label text-md-end">{{__('text.Building')}}*</label>
    <div class="col-md-6 ">
        <select name="building_id" class="form-control @error('building_id') is-invalid @enderror"
                id="building">
            <option disabled selected value="0">Please select your building</option>
            @foreach($buildings as $building)
            <option value="{{$building->id}}"
                {{$building->id == old('building_id') ? 'selected' : ($building->id == $employee->building_id ? 'selected' : '')}}>
                {{$building->building}}</option>
            @endforeach
        </select>
        @error('building_id')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="address" class="col-md-4 col-form-label text-md-end">{{__('text.Address')}}</label>
    <div class="col-md-6 ">
        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
               name="address" value="{{ old('address') ?? $employee->address }}" autocomplete="address"
               placeholder="Enter your address">

        @error('address')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="birthday" class="col-md-4 col-form-label text-md-end">{{__('text.Birthday')}}</label>
    <div class="col-md-6 ">
        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
               name="birthday" value="{{ old('birthday') ?? $employee->birthday }}" autocomplete="birthday">

        @error('birthday')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="join_date" class="col-md-4 col-form-label text-md-end">{{__('text.Join') .' '. __('text.Date')}}</label>
    <div class="col-md-6 ">
        <input id="join_date" type="date" class="form-control @error('join_date') is-invalid @enderror"
               name="join_date" value="{{ old('join_date') ?? $employee->join_date }}" autocomplete="join_date">

        @error('join_date')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
