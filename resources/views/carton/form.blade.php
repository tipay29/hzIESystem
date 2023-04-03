

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">Brand

    </label>
    <div class="col-md-7">
        <select id="brand_id" class="form-control" name="brand_id" >
            <option disabled selected>Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}"
                    {{$brand->id == old('brand_id') ? 'selected' : ($brand->id == $carton->brand_id ? 'selected' : '')}}>
                    {{$brand->brand_name}}</option>
            @endforeach
        </select>
        @error('ctn_brand') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="ctn_size" class="col-md-4 col-form-label text-md-end">
        Carton Size
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Sample: 68.5*45.5*28CM">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">
        <input id="ctn_size" name='ctn_size' type="text" class="form-control"
               placeholder="Enter Carton Size"
               value="{{ old('ctn_size') ?? $carton->ctn_size }}">
        @error('ctn_size') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="ctn_weight" class="col-md-4 col-form-label text-md-end">
        Carton Weight
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Sample: 1.01">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">
        <input id="ctn_weight" name='ctn_weight' type="text" class="form-control"
               placeholder="Enter Carton Weight"
               value="{{old('ctn_weight') ?? $carton->ctn_weight }}">
        @error('ctn_size') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>
