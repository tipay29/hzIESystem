<div class="row">

    {{--                                {{dd($packinglists[0])}}--}}
    <div style="min-height: 50px;" class="col-md-8">

        <img width="500" height="300" src="{{ asset('storage/images/shipmark/' . $packinglists[0]['pl_brand'] .
                                    '/' . $packinglists[0]['pl_type']  . '/' .$packinglists[0]['pl_country'] . '.png') }}" alt="">

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

    <div style="min-height: 50px;" class="col-md-4">

        <h5>Remarks:</h5>

        <textarea  cols="60" rows="10" id="pl_rm_input">
                                        {{$packinglists[0]['pl_remarks']}}
                                    </textarea>

    </div>


</div>
