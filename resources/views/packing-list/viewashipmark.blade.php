<div class="row">


    <div style="min-height: 50px;" class="col-md-8">

        <img width="500" height="300"  src="{{ asset('storage/images/shipmark/' . $packinglists[$x][0]['pl_brand'] .
                                    '/' . $packinglists[$x][0]['pl_type'] . '/' .$packinglists[$x][0]['pl_country'] . '.png') }}" alt="">

    </div>
    <div style="min-height: 50px;" class="col-md-4">

        <h5>Remarks:</h5>

        <textarea  cols="60" rows="10" id="pl_rm_input">
                                        {{$packinglists[$x][0]['pl_remarks']}}
                                    </textarea>

    </div>

</div>
