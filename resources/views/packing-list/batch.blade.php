@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="card mb-3 pl_section-to-print">

                        <div class="card-header d-flex justify-content-between">

                            <h5 class="mt-2">Packing List Batch {{$packinglists[0]->pl_batch}}</h5>

                            <div>

{{--                                <select name="pls_version" id="pls_version" class="btn btn-outline-info">--}}
{{--                                    <option value="0" selected disabled>Select Version</option>--}}
{{--                                    <option value="1" >Style</option>--}}
{{--                                    <option value="2" >Material</option>--}}
{{--                                    <option value="3" >Mat+BuyM+BuyY</option>--}}
{{--                                    <option value="4" >Destination</option>--}}
{{--                                    <option value="4" >Lock</option>--}}
{{--                                </select>--}}

                                <a href="{{route('packing-lists.index')}}"
                                   class="btn btn-outline-success section-to-no-print">
                                    Lists</a>

                                <a href="{{route('packing-lists.exportbatches',$packinglists[0]->pl_batch)}}"
                                   class="btn btn-outline-success section-to-no-print">
                                    Export</a>
                                <a id="pl_print_batch"
                                   class="btn btn-outline-success section-to-no-print">
                                    Print</a>
                                <a href="{{route('packing-lists.viewa',$packinglists[0]->pl_batch)}}"
                                   class="btn btn-outline-success section-to-no-print">
                                    View All</a>
                                <a href="{{route('packing-lists.index')}}"
                                   class="btn btn-outline-secondary">
                                    Back</a>

                            </div>

                        </div>

                        <div class="card-body">

                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{route('packing-lists.batch', $packinglists[0]->pl_batch)}}" method="get">
                            @include('packing-list.batchfilter')

                            <div class="table-responsive">
                                <table class="table" >
                                    <thead>


                                        <tr>
                                            <th width="5%" scope="col">Number</th>
                                            <th width="5%" scope="col">Status</th>

                                            <th width="4%" scope="col">Buy Year</th>
                                            <th width="4%" scope="col">Buy Month</th>
                                            <th width="9%" scope="col">Master PO</th>
                                            <th width="10%" scope="col">PO</th>

                                            <th width="8%" scope="col">Factory PO</th>
                                            <th width="8%" scope="col">Material</th>
                                            <th width="5%" scope="col">Quantity</th>
                                            <th width="18%" scope="col">Country</th>
                                            <th width="8%" scope="col">CRD</th>
                                            <th width="5%" scope="col">PrePack</th>
                                            <th width="12%" scope="col">User</th>
                                            @can('create', App\Models\PackingList::class)
                                            <th width="3%" scope="col">Del</th>
                                                @endcan
                                        </tr>
                                    </thead>

                                    <tbody>

                                    @forelse($packinglists as $key => $packinglist)
                                        <tr>
                                            <td width="5%" scope="col">
                                                <a href="{{route('packing-lists.number', [$packinglist->pl_batch
                                                                        ,$packinglist->pl_number_batch])}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{$packinglist->pl_number_batch}} </a>
                                            </td>
                                            <td scope="col" >
                                            @if($packinglist->pl_status === "Draft")
                                                <p style="background-color: yellow;">{{$packinglist->pl_status}}</p>
                                            @elseif($packinglist->pl_status === "Canceled")
                                                <p style="background-color: red;">{{$packinglist->pl_status}}</p>
                                            @elseif($packinglist->pl_status === "Final")
                                                <p class="bg-success text-white">{{$packinglist->pl_status}}</p>
                                            @endif
                                            </td>

                                            <td  scope="col">{{$packinglist->pl_buy_year}} </td>
                                            <td  scope="col">{{strtoupper(substr($packinglist->pl_buy_month,0,3))}} </td>
                                            <td  scope="col">{{$packinglist->pl_master_po}} </td>
                                            <td  scope="col">{{$packinglist->pl_po_cut}} </td>

                                            <td  scope="col">{{$packinglist->pl_factory_po}} </td>
                                            <td  scope="col">{{$packinglist->pl_material}} </td>
                                            <td  scope="col">{{number_format((float)$packinglistsqty[$key])}} </td>
                                            <td  scope="col">{{$packinglist->pl_country}} </td>
                                            <td  scope="col">{{$packinglist->pl_crd}} </td>
                                            <td scope="col">{{$packinglist->pl_pre_pack}} </td>
                                            <td  scope="col">{{$packinglist->user->name}} </td>
                                            @can('create', App\Models\PackingList::class)


                                            <td scope="col">
                                                @if(auth()->user()->id == $packinglist->user_id)
                                                    <form style="display:inline;" action="{{route('packing-lists.destroy-number', [$packinglist->pl_batch
                                                                        ,$packinglist->pl_number_batch])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none;background-color: white;color:darkred;"
                                                                onclick="return confirm('Delete Packing List Batch Number ?')" >
                                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                @endif

                                            </td>

                                            @endcan
                                        </tr>
                                    @empty
                                        <h6 class="bg-danger"> No Packing List Record</h6>
                                    @endforelse

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td><b>  {{number_format((float)$pl_total_qty)}} </b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                    </tbody>


                                </table>

                            </div>


                        </div>

                    </div>




            </div>
        </div>
    </div>
@endsection

