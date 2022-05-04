@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-around fabric_code_row">
            <div class="col-md-5 ">
                <div class="card fabric_code_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.FabricCodes')}}</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id="fabric-code-container">

                            <table class="table fabric_code_table">
                                <thead>
                                <tr>
                                    <th width="20%">{{__('text.ID')}}</th>
                                    <th width="70%">{{__('text.FabricCode')}}</th>
                                    @can('create',App\Models\FabricCode::class)
                                        <th>{{__('text.Option')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($fabric_codes as $key => $fabric_code)
                                    <tr>
                                        <td>{{ $fabric_code->id }}</td>
                                        <td>{{ $fabric_code->fabric_code }}</td>

                                        @can('update',$fabric_code)
                                            <td>
                                                <button type='button' style="text-decoration: none;
                                                color:darkorange;border:none;padding:0px;background-color: white;"
                                                        class="btn_edit_fabric_code" value="{{$fabric_code->id}}">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                                <button type='button' style="text-decoration: none;
                                                border: none;background-color: white;color:darkred;padding:0px;"
                                                        class="btn_delete_fabric_code" value="{{$fabric_code->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> </button>


                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$fabric_codes->render("pagination::bootstrap-4")}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 ">

                @can('create',App\Models\FabricCode::class)
                <div class="card fabric_code_div_two">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Add'). ' '.__('text.FabricCode')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_code_create" class="col-md-4 col-form-label text-md-end">{{__('text.FabricCode')}}</label>
                                <div class="col-md-7">

                                    <input id="fabric_code_create" type="text" class="form-control"
                                           placeholder="Enter fabric code">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button id="btn-save-fabric-code" class="btn btn-primary">{{__('text.Save'). ' '.__('text.FabricCode')}}</button>
                        </div>
                    </form>

                </div>
                @endcan


                <div class="card fabric_code_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Update'). ' '.__('text.FabricCode')}}</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_code_edit" class="col-md-4 col-form-label text-md-end">{{__('text.FabricCode')}}</label>
                                <div class="col-md-7">

                                    <input id="fabric_code_edit" type="text" class="form-control"
                                           placeholder="Enter fabric code">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-fabric-code" class="btn btn-secondary">{{__('text.Cancel')}}</button>
                            <button id="btn-update-fabric-code" class="btn btn-primary">{{__('text.Update'). ' '.__('text.FabricCode')}}</button>
                        </div>
                    </form>


                </div>

            </div>


    </div>
@endsection
