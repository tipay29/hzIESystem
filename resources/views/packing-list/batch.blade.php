@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="card mb-3 pl_section-to-print">

                        <div class="card-header d-flex justify-content-between">

                            <h5 class="mt-2">Packing List Batch {{$packinglists[0]->pl_batch}}</h5>

                            <div>

                                <a id="pl_print_batch"
                                   class="btn btn-outline-success section-to-no-print">
                                    Print</a>

                                <a href="{{route('packing-lists.viewa',$packinglists[0]->pl_batch)}}"
                                   class="btn btn-outline-success section-to-no-print">
                                    View All</a>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th width="5%" scope="col">Number</th>
                                            <th width="5%" scope="col">Status</th>
                                            <th width="10%" scope="col">PO</th>
                                            <th width="10%" scope="col">Master PO</th>
                                            <th width="10%" scope="col">Factory PO</th>
                                            <th width="5%" scope="col">Quantity</th>
                                            <th width="19%" scope="col">Country</th>
                                            <th width="10%" scope="col">CRD</th>
                                            <th width="10%" scope="col">Ship Month</th>
                                            <th width="5%" scope="col">PrePack</th>
                                            <th width="12%" scope="col">User</th>
                                            <th width="3%" scope="col">Del</th>
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
                                            <td scope="col">{{$packinglist->pl_status}} </td>
                                            <td  scope="col">{{$packinglist->pl_po_cut}} </td>
                                            <td  scope="col">{{$packinglist->pl_master_po}} </td>
                                            <td  scope="col">{{$packinglist->pl_factory_po}} </td>
                                            <td  scope="col">{{$packinglistsqty[$key]}} </td>
                                            <td  scope="col">{{$packinglist->pl_country}} </td>
                                            <td  scope="col">{{$packinglist->pl_crd}} </td>
                                            <td  scope="col">{{date('M',strtotime($packinglist->pl_crd))}} </td>
                                            <td scope="col">{{$packinglist->pl_pre_pack}} </td>
                                            <td  scope="col">{{$packinglist->user->name}} </td>
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
                                        </tr>
                                    @empty
                                        <h6 class="bg-danger"> No Packing List Record</h6>
                                    @endforelse


                                    </tbody>


                                </table>

                            </div>


                        </div>

                    </div>


            </div>
        </div>
    </div>
@endsection
