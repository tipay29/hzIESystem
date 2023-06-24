@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mb-3 pl_section-to-print">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing List All View</h5>

                        <div>





                            <a href="{{url()->previous()}}"
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
                        <form action="{{route('packing-lists.allviews')}}" method="get">

                        @include('packing-list.batchfilter')

                        <div class="table-responsive">

                            <form action="{{route('cartons.order-create')}}" method="get">

                                @csrf
                            <table class="table" >
                                <thead>


                                <tr>
                                    <th width="5%" scope="col">Number</th>
                                    <th width="5%" scope="col">Status</th>

                                    <th width="4%" scope="col">Buy Year</th>
                                    <th width="4%" scope="col">Buy Month</th>
                                    <th width="9%" scope="col">Master PO</th>
                                    <th width="2%" scope="col">All
                                        <input type="checkbox" id="cbSelectAll">
                                    </th>
                                    <th width="10%" scope="col">PO</th>

                                    <th width="8%" scope="col">Factory PO</th>
                                    <th width="8%" scope="col">Material</th>
                                    <th width="5%" scope="col">Quantity</th>
                                    <th width="18%" scope="col">Country</th>
                                    <th width="8%" scope="col">CRD</th>
                                    <th width="5%" scope="col">PrePack</th>
                                    <th width="10%" scope="col">User</th>
                                    @can('create', App\Models\PackingList::class)
                                        <th width="3%" scope="col">Del</th>
                                    @endcan
                                </tr>
                                </thead>

                                <tbody>

                                @if(count($packinglists) !== 0)

                                    @forelse($packinglists as $key => $packinglist)
                                        <tr>
                                            <td width="5%" scope="col">
                                                <a href="{{route('packing-lists.number', [$packinglist->pl_batch
                                                                            ,$packinglist->pl_number_batch])}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{$packinglist->id}} </a>
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
                                            <td  scope="col">{{$packinglist->pl_buy_month}} </td>
                                            <td  scope="col">{{$packinglist->pl_master_po}} </td>
                                            <td  scope="col">
                                                <input type="checkbox" name="pl_details[]" value="
                                        {{$packinglist->pl_batch . '-' . $packinglist->pl_number_batch }}
                                                    ">

                                            </td>
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
                                @endif
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
                            <button id="btn_create_carton_order"
                                    class="btn btn-outline-secondary" type="submit"
                                        style="position: absolute;top: 8px;right:15%;"
                            >Carton Form</button>
                             </form>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
{{--                                {{$packinglists->withQueryString()->onEachSide(2)->links()}}--}}
                            </div>
                        </div>

                    </div>

                </div>




            </div>
        </div>
    </div>
@endsection

