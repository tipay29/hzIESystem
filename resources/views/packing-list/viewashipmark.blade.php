<div class="row">


    <div style="min-height: 50px;" class="col-md-6">

        <img src="{{ asset('storage/images/shipmark/' . $packinglists[$x][0]['pl_brand'] .
                                    '/' . $packinglists[$x][0]['pl_type'] . '/' .$packinglists[$x][0]['pl_country'] . '.png') }}"
             class="img-fluid">

    </div>
    <div style="min-height: 50px;" class="col-md-6">

        <h5>Remarks:</h5>

        <textarea  rows="10" id="pl_rm_input" style="min-width: 100%"
        @cannot('create', App\Models\PackingList::class)
            {{'disabled'}}
            @endcannot
        >
                                        {{$packinglists[$x][0]['pl_remarks']}}
                                    </textarea>

    </div>

</div>
