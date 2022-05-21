@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-around placement_row">
            <div class="col-md-5 ">
                <div class="card placement_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.FabricCodes')}}</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id="placement-container">

                            <table class="table placement_table">
                                <thead>
                                <tr>
                                    <th width="20%">{{__('text.ID')}}</th>
                                    <th width="70%">{{__('text.FabricCode')}}</th>
                                    @can('create', App\Models\Placement::class)
                                        <th>{{__('text.Option')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($placements as $key => $placement)
                                    <tr>
                                        <td>{{ $placement->id }}</td>
                                        <td>{{ $placement->placement }}</td>
                                        @can('update', $placement)
                                            <td>
                                                <button type='button' style="text-decoration: none;
                                                color:darkorange;border:none;padding:0px;background-color: white;"
                                                        class="btn_edit_placement" value="{{$placement->id}}">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                                <button type='button' style="text-decoration: none;
                                                border: none;background-color: white;color:darkred;padding:0px;"
                                                        class="btn_delete_placement" value="{{$placement->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> </button>


                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$placements->onEachSide(1)->links()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 ">
                @can('create', App\Models\Placement::class)
                <div class="card placement_div_two">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Add').' '.__('text.FabricCode')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="placement_create" class="col-md-4 col-form-label text-md-end">{{__('text.FabricCode')}}</label>
                                <div class="col-md-7">

                                    <input id="placement_create" type="text" class="form-control"
                                           placeholder="Enter Fabric Code">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button id="btn-save-placement" class="btn btn-primary">{{__('text.Save').' '.__('text.FabricCode')}}</button>
                        </div>
                    </form>

                </div>
                @endcan


                <div class="card placement_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Update').' '.__('text.FabricCode')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="placement_edit" class="col-md-4 col-form-label text-md-end">{{__('text.FabricCode')}}</label>
                                <div class="col-md-7">

                                    <input id="placement_edit" type="text" class="form-control"
                                           placeholder="Enter Fabric Code">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-placement" class="btn btn-secondary">{{__('text.Cancel')}}</button>
                            <button id="btn-update-placement" class="btn btn-primary">{{__('text.Update').' '.__('text.FabricCode')}}</button>
                        </div>
                    </form>


                </div>

            </div>


    </div>
@endsection
