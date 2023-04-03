<div class="row">

    {{--{{dd($packinglists[0])}}--}}
    <div style="min-height: 50px;" class="col-md-6">


        <select name="" id="pl_select_customer" class="section-pl-to-no-print">

            <option value="0" DISABLED selected>Please select Customer</option>

            @foreach($customers as $customer)

                <option
                    value="{{trim($customer->customer_name . "-" . $customer->customer_name_two) . "-" . $customer->destination}}">
                    {{trim($customer->customer_name . " " . $customer->customer_name_two) . "-" . $customer->destination}}
                </option>

            @endforeach

        </select>

        <img src="{{ asset('storage/images/shipmark/' . $packinglists[0]['pl_brand'] .
                                    '/' . $packinglists[0]['pl_type']  . '/' .
                                    trim($packinglists[0]['pl_country']. " "
                                    .$packinglists[0]['pl_country_two']) . '.png') }}"
        class="img-fluid">

        @can('create', App\Models\PackingList::class)
            <div class="print-hide">

                <form action="{{route('packing-lists.mark')}}"
                      method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="country" value="{{$packinglists[0]['pl_country']}}">
                    <input id="pl_select_brand" type="hidden" name="brand" value="{{$packinglists[0]['pl_brand']}}">
                    <input id="pl_select_type" type="hidden" name="type" value="{{$packinglists[0]['pl_type']}}">
                    Select PNG to upload:
                    <input type="file" name="file" >
                    <input type="submit" name="submit">

                </form>
            </div>
        @endcan
    </div>

    <div style="min-height: 50px;" class="col-md-6">

        <h5>Remarks:</h5>

        <textarea rows="10" id="pl_rm_input" style="min-width: 100%"
               @cannot('create', App\Models\PackingList::class)
                   {{'disabled'}}
               @endcannot
        >
                                        {{$packinglists[0]['pl_remarks']}}
        </textarea>

    </div>


</div>
