@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-around fabric_type_row">
            <div class="col-md-5 ">
                <div class="card fabric_type_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{ __('text.FabricTypes')}}</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id="fabric-type-container">

                            <table class="table fabric_type_table">
                                <thead>
                                <tr>
                                    <th width="20%">{{__('text.ID')}}</th>
                                    <th width="70%">{{__('text.FabricType')}}</th>
                                    @can('create',App\Models\FabricType::class)
                                        <th>{{__('text.Option')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($fabric_types as $key => $fabric_type)
                                    <tr>
                                        <td>{{ $fabric_type->id }}</td>
                                        <td>{{ $fabric_type->fabric_type }}</td>
                                        @can('update',$fabric_type)
                                            <td>
                                                <button type='button' style="text-decoration: none;
                                                color:darkorange;border:none;padding:0px;background-color: white;"
                                                        class="btn_edit_fabric_type" value="{{$fabric_type->id}}">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                                <button type='button' style="text-decoration: none;
                                                border: none;background-color: white;color:darkred;padding:0px;"
                                                        class="btn_delete_fabric_type" value="{{$fabric_type->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> </button>


                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$fabric_types->onEachSide(0)->links()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 ">
                @can('create',App\Models\FabricType::class)
                <div class="card fabric_type_div_two">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Add') . ' ' . __('text.FabricType')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_type_create" class="col-md-4 col-form-label text-md-end">{{ __('text.FabricType')}}</label>
                                <div class="col-md-7">

                                    <input id="fabric_type_create" type="text" class="form-control"
                                           placeholder="Enter fabric type">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sas_create" class="col-md-4 col-form-label text-md-end">SAS</label>
                                <div class="col-md-7">

                                    <input id="sas_create" type="number" class="form-control" step="0.01"
                                           placeholder="Enter sas">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sas_cut_create" class="col-md-4 col-form-label text-md-end">SAS {{__('text.Cut')}}</label>
                                <div class="col-md-7">

                                    <input id="sas_cut_create" type="number" class="form-control" step="0.01"
                                           placeholder="Enter sas cut">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button id="btn-save-fabric-type" class="btn btn-primary">{{__('text.Save') . ' ' . __('text.FabricType')}}</button>
                        </div>
                    </form>

                </div>
                @endcan


                <div class="card fabric_type_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Update') . ' ' . __('text.FabricType')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_type_edit" class="col-md-4 col-form-label text-md-end">{{ __('text.FabricType')}}</label>
                                <div class="col-md-7">

                                    <input id="fabric_type_edit" type="text" class="form-control"
                                           placeholder="Enter fabric type">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sas_edit" class="col-md-4 col-form-label text-md-end">SAS</label>
                                <div class="col-md-7">

                                    <input id="sas_edit" type="number" class="form-control" step="0.01"
                                           placeholder="Enter sas">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sas_cut_edit" class="col-md-4 col-form-label text-md-end">SAS {{ __('text.Cut')}}</label>
                                <div class="col-md-7">

                                    <input id="sas_cut_edit" type="number" class="form-control" step="0.01"
                                           placeholder="Enter sas cut">

                                </div>
                            </div>



                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-fabric-type" class="btn btn-secondary">{{__('text.Cancel')}}</button>
                            <button id="btn-update-fabric-type" class="btn btn-primary">{{__('text.Update') . ' ' . __('text.FabricType')}}</button>
                        </div>
                    </form>


                </div>

            </div>

    </div>
@endsection
