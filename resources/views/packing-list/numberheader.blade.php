


            <input id="ctn_brand" type="hidden" value="{{$packinglists[0]['pl_brand']}}">
            <input id="ctn_type" type="hidden" value="{{$packinglists[0]['pl_type']}}">

            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][0]))
                <input type="hidden" id="size_one" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][0]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][0]))
                <input type="hidden" id="size_value_one" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][0]}}">
                @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][1]))
                <input type="hidden" id="size_two" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][1]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][1]))
                <input type="hidden" id="size_value_two" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][1]}}">
                @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][2]))
                <input type="hidden" id="size_three" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][2]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][2]))
                <input type="hidden" id="size_value_three" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][2]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][3]))
                <input type="hidden" id="size_four" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][3]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][3]))
                <input type="hidden" id="size_value_four" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][3]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][4]))
                <input type="hidden" id="size_five" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][4]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][4]))
                <input type="hidden" id="size_value_five" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][4]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][5]))
                <input type="hidden" id="size_six" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][5]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][5]))
                <input type="hidden" id="size_value_six" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][5]}}">
                @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][6]))
                <input type="hidden" id="size_seven" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][6]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][6]))
                <input type="hidden" id="size_value_seven" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][6]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][7]))
                <input type="hidden" id="size_eight" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][7]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][7]))
                <input type="hidden" id="size_value_eight" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][7]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][8]))
                <input type="hidden" id="size_nine" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][8]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][8]))
                <input type="hidden" id="size_value_nine" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][8]}}">
                    @endif
            @endif
            @if(isset($packinglists[count($packinglists)-1]['pl_ctn_list'][9]))
                <input type="hidden" id="size_ten" value="{{$packinglists[count($packinglists)-1]['pl_ctn_list'][9]}}">
                @if(isset($packinglists[count($packinglists)-1]['pl_size_value_list'][9]))
                <input type="hidden" id="size_value_ten" value="{{$packinglists[count($packinglists)-1]['pl_size_value_list'][9]}}">
                    @endif
            @endif

                <button style="display: none;" id="addMcqModalBtn" type="button" class="btn btn-outline-info col-md-6" data-bs-toggle="modal"
                        data-bs-target="#addMcqModal">
                    Add MCQ
                </button>
