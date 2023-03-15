<div class="row">

    {{--                                {{dd($packinglists[0])}}--}}
    <div style="min-height: 50px;" class="col-md-6">

        <img src="{{ asset('storage/images/shipmark/' . $packinglists[0]['pl_brand'] .
                                    '/' . $packinglists[0]['pl_type']  . '/' .$packinglists[0]['pl_country'] . '.png') }}"
        class="img-fluid">
        @can('create', App\Models\PackingList::class)
        <div class="print-hide">

        <form action="{{route('packing-lists.mark')}}"
              method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="country" value="{{$packinglists[0]['pl_country']}}">
            <input type="hidden" name="brand" value="{{$packinglists[0]['pl_brand']}}">
            <input type="hidden" name="type" value="{{$packinglists[0]['pl_type']}}">
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
