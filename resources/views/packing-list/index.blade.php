@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Packing Lists</h5>

                        <div>
                            @can('create', App\Models\PackingList::class)
                            <a href="{{route('packing-lists.create')}}"
                               class="btn btn-outline-success">
                                Create PL</a>
                            @endcan

{{--                                <a href="{{route('packing-lists.ctnform', $packinglists[0][0]['pl_batch'])}}"--}}
{{--                                   class="btn btn-outline-success">--}}
{{--                                    Carton Form</a>--}}
{{--                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cartonOrderModal">--}}
{{--                                Create Carton Form--}}
{{--                            </button>--}}
                                <a href="{{route('cartons.cartoncreate')}}"
                                   class="btn btn-outline-secondary"
                                >Create Carton Form</a>

                            <a href="{{route('packing-lists.allviews')}}"
                               class="btn btn-outline-secondary"
                            >All View</a>

                            <a href="{{route('cartons.index')}}"
                            class="btn btn-outline-secondary"
                            >View Carton</a>
                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>
                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{route('packing-lists.index')}}" method="get">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-md-2">
                                        <small for="pls_po">PO</small>
                                        <input id="pls_po" type="text" class="form-control"
                                               value="{{request('pls_po')}}" name="pls_po">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pls_master_po">Master PO</small>
                                        <input id="pls_master_po" type="text" class="form-control"
                                               value="{{request('pls_master_po')}}" name="pls_master_po">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pls_factory_po">Factory PO</small>
                                        <input id="pls_factory_po" type="text" class="form-control"
                                               value="{{request('pls_factory_po')}}" name="pls_factory_po">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pls_material">Material</small>
                                        <input id="pls_material" type="text" class="form-control"
                                               value="{{request('pls_material')}}" name="pls_material">
                                    </div>

                                    <div class="col-md-2">
                                        <small for="pls_status">Status</small>
                                        <input id="pls_status" type="text" class="form-control"
                                               value="{{request('pls_status')}}"  name="pls_status">
                                    </div>
                                    <div class="col-md-2">
                                        <small for="pls_customer_name">Customer Name</small>
                                        <input maxlength="2" id="pls_customer_name" type="text" class="form-control"
                                               value="{{request('pls_customer_name')}}" name="pls_customer_name">
                                    </div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-2">
                                        <small for="pls_user">Created By</small>
                                        <input maxlength="1" id="pls_user" type="text" class="form-control"
                                               value="{{request('pls_user')}}" name="pls_user">
                                    </div>

                                    <div class="col-md-2">
                                        <small for="pls_crd_one">CRD1</small>
                                        <input id="pls_crd_one" type="date" class="form-control"
                                               value="{{request('pls_crd_one')}}" name="pls_crd_one">
                                    </div>

                                    <div class="col-md-2">
                                        <small for="pls_crd_two">CRD2</small>
                                        <input id="pls_crd_two" type="date" class="form-control"
                                               value="{{request('pls_crd_two')}}" name="pls_crd_two">
                                    </div>

                                    <div class="col-md-2">
                                        <small for="pls_date_created">Date Created</small>
                                        <input id="pls_datecreated" type="date" class="form-control"
                                               value="{{request('pls_date_created')}}" name="pls_date_created">
                                    </div>
                                    <div class="col-md-2">
                                        <button id="pls_btn_clear" style="height: 100%;" class="btn form-control btn-primary">
                                            {{__('text.Clear')}}</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="pls_btn_apply" style="height: 100%;" class="btn form-control btn-primary">
                                            {{__('text.Search')}}</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">Batch </th>

                                        <th width="10%" scope="col">Master PO</th>
                                        <th width="15%" scope="col">PO </th>
                                        <th width="10%" scope="col">Factory PO</th>
                                        <th width="10%" scope="col">Brand</th>
                                        <th width="10%" scope="col">Type</th>
                                        <th width="20%" scope="col">Created Date </th>
                                        <th width="20%" scope="col">Create By </th>
                                        @can('create', App\Models\PackingList::class)
                                        <th width="5%" scope="col">Del</th>
                                            @endcan
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
                                            <td  scope="col">{{$packinglist->pl_master_po}} </td>
                                            <td scope="col">{{$packinglist->pl_po_cut}} </td>

                                            <td scope="col">{{$packinglist->pl_factory_po}}</td>
                                            <td scope="col">{{$packinglist->pl_brand}}</td>
                                            <td  scope="col">{{$packinglist->pl_type}}</td>
                                            <td scope="col">{{$packinglist->created_at}} </td>
                                            <td scope="col">{{$packinglist->user->name}} </td>
                                            @can('create', App\Models\PackingList::class)
                                                <td>
                                                    @if(auth()->user()->id == $packinglist->user_id)
                                                    <form style="display:inline;" action="{{route('packing-lists.destroy-batch', $packinglist->pl_batch)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none;background-color: white;color:darkred;"
                                                                onclick="return confirm('Delete Packing List Batch {{$packinglist->pl_batch}}  ?')" >
                                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                    @endif
                                                </td>
                                            @endcan
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

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                {{$packinglists->withQueryString()->onEachSide(2)->links()}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    @include('carton.order-modal')--}}

@endsection

