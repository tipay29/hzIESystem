{{--{{collect($cut->styles)}}--}}
<div class="container-one">

    <div class="row-one d-flex align-items-start flex-column flex-wrap">

        <div class="form-group">
            <label>{{__('text.Style') }}

                <button id="cut_switch_add_style_one" type="button" class="btn btn-xsm"
                        style="background-color: white;color: #0a53be;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>
                <button id="cut_switch_add_style_two" type="button" class="btn btn-xsm"
                        style="background-color: #0a53be;color: white;display: none;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>

                @error('style') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_switch_input_style_one"
                    class="chosen-select form-control" name="style" >


            </select>



            <div class="input-group">
                <input id="cut_switch_input_style_two" type="text" class="form-control"
                       placeholder="Enter Style" style="display: none;">
                <div class="input-group-append">
                    <button id="cut_btn_style_two" class="btn btn-outline-secondary" type="button"
                            style="display: none;">Enter</button>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label>{{__('text.PurchaseOrder') }}

                <button id="cut_switch_add_po_one" type="button" class="btn btn-xsm"
                        style="background-color: white;color: #0a53be;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>
                <button id="cut_switch_add_po_two" type="button" class="btn btn-xsm"
                        style="background-color: #0a53be;color: white;display: none;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>

                @error('purchase_order') <small  class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_switch_input_po_one" data-placeholder="Select Purchase Order"
                    multiple class="chosen-select  form-control" name="purchase_order[]">

            </select>

            <div class="input-group">
                <input id="cut_switch_input_po_two" type="text" class="form-control"
                       placeholder="Enter Purchase Order" style="display: none;">
                <div class="input-group-append">
                    <button id="cut_btn_po_two" class="btn btn-outline-secondary" type="button"
                            style="display: none;">Enter</button>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label>{{__('text.FabricType') }}

                <button id="cut_switch_add_ftype_one" type="button" class="btn btn-xsm"
                        style="background-color: white;color: #0a53be;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>
                <button id="cut_switch_add_ftype_two" type="button" class="btn btn-xsm"
                        style="background-color: #0a53be;color: white;display: none;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>

                @error('fabric_type') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_switch_input_ftype_one" data-placeholder="Select Fabric Type"
                    multiple class="chosen-select form-control" name="fabric_type[]">

            </select>

            <div class="input-group">
                <input id="cut_switch_input_ftype_two" type="text" class="form-control"
                       placeholder="Enter Fabric Type" style="display: none;">
                <div class="input-group-append">
                    <button id="cut_btn_ftype_two" class="btn btn-outline-secondary" type="button"
                            style="display: none;">Enter</button>
                </div>
            </div>

        </div>


        <div class="form-group">
            <label>{{__('text.FabricColor') }}

                <button id="cut_switch_add_fcolor_one" type="button" class="btn btn-xsm"
                        style="background-color: white;color: #0a53be;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>
                <button id="cut_switch_add_fcolor_two" type="button" class="btn btn-xsm"
                        style="background-color: #0a53be;color: white;display: none;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>

                @error('fabric_color') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_switch_input_fcolor_one" data-placeholder="Select Fabric Color"
                    multiple class="chosen-select form-control" name="fabric_color[]">

            </select>

            <div class="input-group">
                <input id="cut_switch_input_fcolor_two" type="text" class="form-control"
                       placeholder="Enter Fabric Color" style="display: none;">
                <div class="input-group-append">
                    <button id="cut_btn_fcolor_two" class="btn btn-outline-secondary" type="button"
                            style="display: none;">Enter</button>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label>{{__('text.ColorCode') }}

                <button id="cut_switch_add_fcode_one" type="button" class="btn btn-xsm"
                        style="background-color: white;color: #0a53be;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>
                <button id="cut_switch_add_fcode_two" type="button" class="btn btn-xsm"
                        style="background-color: #0a53be;color: white;display: none;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>

                @error('fabric_code') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_switch_input_fcode_one" data-placeholder="Select Color Code"
                    multiple class="chosen-select  form-control" name="fabric_code[]">

            </select>

            <div class="input-group">
                <input id="cut_switch_input_fcode_two" type="text" class="form-control"
                       placeholder="Enter Color Code" style="display: none;">
                <div class="input-group-append">
                    <button id="cut_btn_fcode_two" class="btn btn-outline-secondary" type="button"
                            style="display: none;">Enter</button>
                </div>
            </div>

        </div>


        <div class="form-group">
            <label>{{__('text.FabricCode') }}

                <button id="cut_switch_add_placement_one" type="button" class="btn btn-xsm"
                        style="background-color: white;color: #0a53be;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>
                <button id="cut_switch_add_placement_two" type="button" class="btn btn-xsm"
                        style="background-color: #0a53be;color: white;display: none;" >
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                </button>

                @error('placement') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cut_switch_input_placement_one" data-placeholder="Select Fabric Code"
                    multiple class="chosen-select form-control" name="placement[]" >

            </select>

            <div class="input-group">
                <input id="cut_switch_input_placement_two" type="text" class="form-control"
                       placeholder="Enter Fabric Code" style="display: none">
                <div class="input-group-append">
                    <button id="cut_btn_placement_two" class="btn btn-outline-secondary" type="button"
                            style="display: none">Enter</button>
                </div>
            </div>

        </div>



    </div>

    <div class="row-two d-flex align-items-start flex-column flex-wrap">

        <div class="form-group">
            <label for="table_num">{{__('text.Table')}}
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
            <label for="marker_length">{{__('text.MarkerLength') }}
                @error('marker_length') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="marker_length" name='marker_length' type="number" class="form-control"
                   placeholder="Enter Marker Length" step="0.01"
                   value="{{old('marker_length') ?? $cut->marker_length}}">

        </div>

        <div class="form-group">
            <label for="layer_count">{{__('text.TotalLayers')}}
                @error('layer_count') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="layer_count" name='layer_count' type="number" class="form-control"
                   placeholder="Enter Total Layers" value="{{old('layer_count') ?? $cut->layer_count}}">

        </div>

        <div class="form-group">
            <label for="part_count">{{__('text.TotalParts')}}
                @error('part_count') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="part_count" name='part_count' type="number" class="form-control"
                   placeholder="Enter Total Parts" value="{{old('part_count') ?? $cut->part_count}}">

        </div>
        <div class="form-group">
            <label for="size_ratio">{{__('text.SizeRatio')}}
                @error('size_ratio') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="size_ratio" name='size_ratio' type="number" class="form-control"
                   placeholder="Enter Size Ratio" value="{{old('size_ratio') ?? $cut->size_ratio}}">

        </div>

        <div class="form-group">


            <label for="work_hours">{{__('WorkTime')}}
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


        <h6 class="px-2 mt-2">{{__('text.SpreaderDetail')}}</h6>


        <div class="form-group">
            <label>{{__('text.Spreader')}}
                @error('spreader_id') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="spreader_id" data-placeholder="Choose spreader"
                    multiple class="chosen-select form-control" name="spreader_id[]">
                @foreach($employees as $employee)
                    @if($employee->job_id == 4 || $employee->job_id == 5)
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
            <label for="spread_start">{{__('text.SpreadStart(date/time)')}}
                @error('spread_start') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="spread_start" name='spread_start' type="datetime-local"
                   class="form-control" value="{{old('spread_start') ?? \Carbon\Carbon::parse($cut->spread_start)->format('Y-m-d\TH:i')}}">

        </div>

        <div class="form-group">
            <label for="spread_end">{{__('text.SpreadEnd(date/time)')}}
                @error('spread_end') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="spread_end" name='spread_end' type="datetime-local"
                   class="form-control" value="{{old('spread_end') ?? \Carbon\Carbon::parse($cut->spread_end)->format('Y-m-d\TH:i')}}">

        </div>

        <h6 class="px-2 mt-2" >{{__('text.CutterDetail')}}</h6>

        <div class="form-group">
            <label>{{__('text.Cutter')}}
                @error('cutter_id') <small class="text-danger">{{$message}}</small>  @enderror
            </label>

            <select id="cutter_id" data-placeholder="Choose cutter"
                    multiple class="chosen-select form-control" name="cutter_id[]">
                @foreach($employees as $employee)
                    @if($employee->job_id == 4 || $employee->job_id == 5)
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
            <label for="cut_start">{{__('text.CutStart(date/time)')}}
                @error('cut_start') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="cut_start" name='cut_start' type="datetime-local"
                   class="form-control" value="{{old('cut_start') ?? \Carbon\Carbon::parse($cut->cut_start)->format('Y-m-d\TH:i')}}">

        </div>

        <div class="form-group">
            <label for="cut_end">{{__('text.CutEnd(date/time)')}}
                @error('cut_end') <small class="text-danger">{{$message}}</small>  @enderror
            </label>
            <input id="cut_end" name='cut_end' type="datetime-local"
                   class="form-control" value="{{old('cut_end') ?? \Carbon\Carbon::parse($cut->cut_end)->format('Y-m-d\TH:i')}}">

        </div>

    </div>

    <input type="hidden" name="building_id" value="{{auth()->user()->employee->building->id}}">

</div>
