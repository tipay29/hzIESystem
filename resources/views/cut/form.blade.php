{{--{{collect($cut->styles)}}--}}
<div class="container-one">

    <div class="row-one d-flex align-items-start flex-column flex-wrap">

        <div class="form-group">
            <label>{{__('text.Style') }}

                <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                        data-placement="top" title="Add Style:
                                                        Go to Styles>Add Style">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>

                @error('style') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_style"
                    class="form-control" name="style">
                <option value="#" disabled selected>Select style</option>
                @forelse($styles as $style)
                    <option value="{{$style->id}}"
                        {{$style->id == old('style') ? 'selected' :
                            (($cut->styles)->contains($style->id) ? 'selected':'')
                        }}
                    > {{$style->style_code}} </option>
                @empty

                @endforelse
            </select>

        </div>

        <div class="form-group">
            <label>{{__('text.PurchaseOrder') }}

                <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                        data-placement="top" title="Add Purchase Order for this Style:
                                                        Go to Orders>Edit Style>Select Another Order">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>

                @error('purchase_order') <small  class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_purchase_order" data-placeholder="Select Purchase Order"
                    multiple class="chosen-select  form-control" name="purchase_order[]" >
            </select>


        </div>

        <div class="form-group">
            <label>{{__('text.FabricCode') }}

                <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                        data-placement="top" title="Add Fabric Code for this Style:
                                                        Go to Orders>Edit PO>Select Another Code">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>

                @error('fabric_code') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_fabric_code" data-placeholder="Select Fabric Code"
                    multiple class="chosen-select  form-control" name="fabric_code[]">

            </select>

        </div>

        <div class="form-group">
            <label>{{__('text.FabricColor') }}

                <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                        data-placement="top" title="Add Fabric Color for this PO:
                                                        Go to Orders>Edit PO>Select Another Color">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>

                @error('fabric_color') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_fabric_color" data-placeholder="Select Fabric Color"
                    multiple class="chosen-select form-control" name="fabric_color[]">

            </select>

        </div>

        <div class="form-group">
            <label>{{__('text.FabricType') }}

                <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                        data-placement="top" title="Add Fabric Type for this PO:
                                                        Go to Orders>Edit PO>Select Another Type">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>

                @error('fabric_type') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_fabric_type" data-placeholder="Select Fabric Type"
                    multiple class="chosen-select form-control" name="fabric_type[]">

            </select>

        </div>

        <div class="form-group">
            <label>{{__('text.Placement') }}

                <button type="button" class="btn btn-secondary btn-xsm" data-toggle="tooltip"
                        data-placement="top" title="Add Placement for this PO:
                                                        Go to Orders>Edit PO>Select Another Placement">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                </button>

                @error('placement') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_placement" data-placeholder="Select Placement"
                    multiple class="chosen-select form-control" name="placement[]">

            </select>

        </div>



    </div>

    <div class="row-two d-flex align-items-start flex-column flex-wrap">

        <div class="form-group">
            <label for="table_num">Table
                @error('table_num') <small class="text-danger">{{$message}}</small> @enderror
            </label>
            <select id="table_num" class="form-control" name="table_num" >
                <option disabled selected>Select table number</option>
                @for($i = 1; $i < 16; $i++)
                    <option value="{{$i}}"
                        {{$i == old('table_num') ? 'selected' : ($i == $cut->table_num ? 'selected' : '')}}
                    >{{$i}}</option>
                @endfor
            </select>

        </div>





        <div class="form-group">
            <label for="marker_length">Marker Length
                @error('marker_length') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="marker_length" name='marker_length' type="number" class="form-control"
                   placeholder="Enter Marker Length" step="0.01"
                   value="{{old('marker_length') ?? $cut->marker_length}}">

        </div>

        <div class="form-group">
            <label for="layer_count">Layers
                @error('layer_count') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="layer_count" name='layer_count' type="number" class="form-control"
                   placeholder="Enter Total Layers" value="{{old('layer_count') ?? $cut->layer_count}}">

        </div>

        <div class="form-group">
            <label for="part_count">Parts
                @error('part_count') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="part_count" name='part_count' type="number" class="form-control"
                   placeholder="Enter Total Parts" value="{{old('part_count') ?? $cut->part_count}}">

        </div>
        <div class="form-group">
            <label for="size_ratio">Size Ratio
                @error('size_ratio') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="size_ratio" name='size_ratio' type="number" class="form-control"
                   placeholder="Enter Size Ratio" value="{{old('size_ratio') ?? $cut->size_ratio}}">

        </div>

        <div class="form-group">
            <label for="cut_count">Cut Count
                @error('cut_count') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="cut_count" name='cut_count' type="number" class="form-control"
                   placeholder="Enter Cut Count" value="{{old('cut_count') ?? $cut->cut_count}}">

        </div>

        <div class="form-group">


            <label for="work_hours">Work Time
                @error('work_hours') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <div class="mt-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="work_hours" id="work_hour1" value="8"
                        {{8 == old('work_hours') ? 'checked' : (8 == $cut->work_hours ? 'checked' : '')}}
                    >
                    <label class="form-check-label" for="work_hour1">4PM</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="work_hours" id="work_hour2" value="10"
                        {{10 == old('work_hours') ? 'checked' : (10 == $cut->work_hours ? 'checked' : '')}}>
                    <label class="form-check-label" for="work_hour2">6PM</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="work_hours" id="work_hour3" value="12"
                        {{12 == old('work_hours') ? 'checked' : (12 == $cut->work_hours ? 'checked' : '')}}>
                    <label class="form-check-label" for="work_hour3">8PM</label>
                </div>

            </div>



        </div>


    </div>
    <div class="row-three d-flex align-items-start flex-column flex-wrap">


        <h6 class="px-2 mt-2">Spread details</h6>


        <div class="form-group">
            <label>Spreader
                @error('spreader_id') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="spreader_id" data-placeholder="Choose spreader"
                    multiple class="chosen-select form-control" name="spreader_id[]">
                @foreach($employees as $employee)
                    @if($employee->job_id == 5)
                        <option value="{{$employee->id}}"
                            {{(collect(old('spreader_id'))->contains($employee->id)) ? 'selected' :
                            (($cut->employees)->contains($employee->id) ? 'selected' : '')
                            }}
                        >{{$employee->id}} {{$employee->name}}</option>
                    @endif
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="spread_start">Spread Start
                @error('spread_start') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="spread_start" name='spread_start' type="datetime-local"
                   class="form-control" value="{{old('spread_start') ?? \Carbon\Carbon::parse($cut->spread_start)->format('Y-m-d\TH:i')}}">

        </div>

        <div class="form-group">
            <label for="spread_end">Spread End
                @error('spread_end') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="spread_end" name='spread_end' type="datetime-local"
                   class="form-control" value="{{old('spread_end') ?? \Carbon\Carbon::parse($cut->spread_end)->format('Y-m-d\TH:i')}}">

        </div>

        <h6 class="px-2 mt-2" >Cut details</h6>

        <div class="form-group">
            <label>Cutter
                @error('cutter_id') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cutter_id" data-placeholder="Choose cutter"
                    multiple class="chosen-select form-control" name="cutter_id[]">
                @foreach($employees as $employee)
                    @if($employee->job_id == 4)
                        <option value="{{$employee->id}}"
                            {{(collect(old('cutter_id'))->contains($employee->id)) ? 'selected' :
                            (($cut->employees)->contains($employee->id) ? 'selected' : '')
                            }}
                        >{{$employee->id}} {{$employee->name}}</option>
                    @endif
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="cut_start">Cut Start
                @error('cut_start') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="cut_start" name='cut_start' type="datetime-local"
                   class="form-control" value="{{old('cut_start') ?? \Carbon\Carbon::parse($cut->cut_start)->format('Y-m-d\TH:i')}}">

        </div>

        <div class="form-group">
            <label for="cut_end">Cut End
                @error('cut_end') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="cut_end" name='cut_end' type="datetime-local"
                   class="form-control" value="{{old('cut_end') ?? \Carbon\Carbon::parse($cut->cut_end)->format('Y-m-d\TH:i')}}">

        </div>

    </div>

    <input type="hidden" name="building_id" value="{{auth()->user()->employee->building->id}}">

</div>
