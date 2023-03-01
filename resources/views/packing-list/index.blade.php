@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing List</h5>

                        <div>

                            <a href="{{route('packing-lists.create')}}"
                               class="btn btn-outline-success">
                                Create PL</a>


                            <a href="{{route('cartons.index')}}"
                            class="btn btn-outline-secondary"
                            >View Carton</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">Batch </th>
                                        <th width="15%" scope="col">PO </th>
                                        <th width="10%" scope="col">Master PO</th>
                                        <th width="10%" scope="col">Factory PO</th>
                                        <th width="10%" scope="col">Brand</th>
                                        <th width="10%" scope="col">Type</th>
                                        <th width="20%" scope="col">Created Date </th>
                                        <th width="20%" scope="col">Create By </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($packinglists as $packinglist)

                                        <tr>
                                            <td  scope="col">
                                                <a href="{{route('packing-lists.batch', $packinglist->pl_batch)}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{$packinglist->pl_batch}} </a>
                                            </td>
                                            <td scope="col">{{$packinglist->pl_po_cut}} </td>
                                            <td  scope="col">{{$packinglist->pl_master_po}} </td>
                                            <td scope="col">{{$packinglist->pl_factory_po}}</td>
                                            <td scope="col">{{$packinglist->pl_brand}}</td>
                                            <td  scope="col">{{$packinglist->pl_type}}</td>
                                            <td scope="col">{{$packinglist->created_at}} </td>
                                            <td scope="col">{{$packinglist->user->name}} </td>

                                        </tr>

                                    @empty
                                        <h6 class="bg-danger"> No Packing List Record</h6>
                                    @endforelse

                                </tbody>

                            </table>
{{--                            <div class="row">--}}
{{--                                <div class="col-12 d-flex justify-content-center ">--}}
{{--                                    {{$packinglists->render("pagination::bootstrap-4")}}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

