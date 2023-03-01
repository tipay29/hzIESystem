@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-header d-flex justify-content-between">

                            <h5 class="mt-2">Packing List Batch {{$packinglists[0]->pl_batch}}</h5>

                            <div>

                                <a href="{{route('packing-lists.viewa',$packinglists[0]->pl_batch)}}"
                                   class="btn btn-outline-success">
                                    View All</a>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th width="5%" scope="col">Number</th>
                                            <th width="5%" scope="col">Batch</th>
                                            <th width="13%" scope="col">PO</th>
                                            <th width="13%" scope="col">Master PO</th>
                                            <th width="19%" scope="col">Country</th>
                                            <th width="13%" scope="col">CRD</th>
                                            <th width="5%" scope="col">PrePack</th>
                                            <th width="12%" scope="col">User</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($packinglists as $packinglist)
                                        <tr>
                                            <td width="5%" scope="col">
                                                <a href="{{route('packing-lists.number', [$packinglist->pl_batch
                                                                        ,$packinglist->pl_number_batch])}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{$packinglist->pl_number_batch}} </a>
                                            </td>
                                            <td width="5%" scope="col">{{$packinglist->pl_batch}} </td>
                                            <td width="13%" scope="col">{{$packinglist->pl_po_cut}} </td>
                                            <td width="13%" scope="col">{{$packinglist->pl_master_po}} </td>
                                            <td width="19%" scope="col">{{$packinglist->pl_country}} </td>
                                            <td width="13%" scope="col">{{$packinglist->pl_crd}} </td>
                                            <th width="5%" scope="col">{{$packinglist->pl_pre_pack}} </th>
                                            <td width="12%" scope="col">{{$packinglist->user->name}} </td>
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

