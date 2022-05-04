{{--{{dd($purchase_order_relations)}}--}}


<div class="row mb-3">
    <label for="style_code" class="col-md-4 col-form-label text-md-end">
        {{__('text.Style')}}</label>
    <div class="col-md-7">
        <input id="style_code" name='style_code' type="text" class="form-control"
               placeholder="Enter style code" value="{{old('style_code')  ?? $style->style_code}}">
        @error('style_code') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>

<div class="row mb-3">
    <label  class="col-md-4 col-form-label text-md-end">{{__('text.PurchaseOrder')}}
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Add Fabric Code: Go to Orders>Purchase Order">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">
        <select id="purchase_order" data-placeholder="Select purchase order"
                multiple class="chosen-select form-control" name="purchase_order[]">
            @foreach($purchase_orders as $purchase_order)
                <option value="{{$purchase_order->id}}"
                    {{ (collect(old('purchase_order'))->contains($purchase_order->id)) ? 'selected'      // selected
                    : (($style->purchase_orders)->contains($purchase_order->id) ? 'selected'
                    : (($purchase_order_relations)->contains($purchase_order->id) ? '' : 'disabled')) }}
{{--                    {{}}--}}
                >{{$purchase_order->purchase_order}}</option>
            @endforeach

        </select>
        @error('fabric_code') <small class="text-danger">{{$message}} </small> @enderror
    </div>

</div>

<div class="row mb-3">
    <label  class="col-md-4 col-form-label text-md-end">{{__('text.FabricCode')}}
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Add Fabric Code: Go to Orders>Fabric Code">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">
        <select id="fabric_code" data-placeholder="Select fabric code"
                multiple class="chosen-select form-control" name="fabric_code[]">
            @foreach($fabric_codes as $fabric_code)
                <option value="{{$fabric_code->id}}"
                    {{ (collect(old('fabric_code'))->contains($fabric_code->id)) ? 'selected'
                    : (($style->fabric_codes)->contains($fabric_code->id) ? 'selected' : '') }}
                >{{$fabric_code->fabric_code}}</option>
            @endforeach

        </select>
        @error('fabric_code') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>


<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">{{__('text.FabricColor')}}
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Add Fabric Color: Go to Orders>Fabric Colors">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">
        <select id="fabric_color" data-placeholder="Select fabric color"
                multiple class="chosen-select form-control" name="fabric_color[]">

            @foreach($fabric_colors as $fabric_color)

                <option value="{{$fabric_color->id}}"
                    {{ (collect(old('fabric_color'))->contains($fabric_color->id)) ? 'selected'
                    : (($style->fabric_colors)->contains($fabric_color->id) ? 'selected' : '') }}
                >{{$fabric_color->fabric_color}}</option>
            @endforeach
        </select>
        @error('fabric_color') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">{{__('text.FabricType')}}
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Add Fabric Type: Go to Orders>Fabric Type">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">

        <select id="fabric_type" data-placeholder="Select type code"
                multiple class="chosen-select form-control" name="fabric_type[]">
            @foreach($fabric_types as $fabric_type)
                <option value="{{$fabric_type->id}}"
                    {{ (collect(old('fabric_type'))->contains($fabric_type->id)) ? 'selected'
                    : (($style->fabric_types)->contains($fabric_type->id) ? 'selected' : '') }}
                >{{$fabric_type->fabric_type}}</option>
            @endforeach

        </select>
        @error('fabric_type') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">{{__('text.Placement')}}
        <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                data-placement="top" title="Add Placement: Go to Orders>Placement">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </button>
    </label>
    <div class="col-md-7">
        <select id="placement" data-placeholder="Select placement"
                multiple class="chosen-select form-control" name="placement[]">
            @foreach($placements as $placement)
                <option value="{{$placement->id}}"
                    {{ (collect(old('placement'))->contains($placement->id)) ? 'selected'
            : (($style->placements)->contains($placement->id) ? 'selected' : '') }}

                >{{$placement->placement}}</option>
            @endforeach
        </select>
        @error('placement') <small class="text-danger">{{$message}} </small> @enderror
    </div>
</div>
