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

                            <a href="{{route('packing-lists.allviews')}}"
                               class="btn btn-outline-secondary">
                                All View</a>
                            <a href="{{route('cartons.index')}}"
                            class="btn btn-outline-secondary"
                            >View Carton</a>
                            <a href="{{route('styles.editweights')}}"
                               class="btn btn-outline-secondary"
                            >Edit NW</a>
                            <a href="{{route('styles.editmcqs')}}"
                               class="btn btn-outline-secondary"
                            >Edit MCQ</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{route('packing-lists.index')}}" method="get">
                            @include('packing-list.batchfilter')
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

