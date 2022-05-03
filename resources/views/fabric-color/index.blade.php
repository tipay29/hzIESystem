@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row justify-content-around fabric_color_row">
            <div class="col-md-5 ">
                <div class="card fabric_color_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Fabric Colors</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id=" fabric-color-container">

                            <table class="table fabric_color_table">
                                <thead>
                                <tr>
                                    <th width="20%">ID</th>
                                    <th width="70%">Color</th>
                                    @can('update',1)
                                        <th>Option</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($fabric_colors as $key => $fabric_color)
                                    <tr>
                                        <td>{{ $fabric_color->id }}</td>
                                        <td>{{ $fabric_color->fabric_color }}</td>
                                        @can('update',$fabric_color->id)
                                            <td>
                                                <button type='button' style="text-decoration: none;
                                                color:darkorange;border:none;padding:0px;background-color: white;"
                                                       class="btn_edit_fabric_color" value="{{$fabric_color->id}}">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                                <button type='button' style="text-decoration: none;
                                                border: none;background-color: white;color:darkred;padding:0px;"
                                                        class="btn_delete_fabric_color" value="{{$fabric_color->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> </button>


                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$fabric_colors->render("pagination::bootstrap-4")}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 ">

                @can('create',App\Models\FabricColor::class)
                <div class="card fabric_color_div_two">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Fabric Color</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                                @csrf
                                <div class="row mb-3">
                                    <label for="fabric_color_create" class="col-md-4 col-form-label text-md-end">Fabric Color</label>
                                    <div class="col-md-7">

                                        <input id="fabric_color_create" type="text" class="form-control"
                                               placeholder="Enter fabric color">

                                    </div>
                                </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button id="btn-save-fabric-color" class="btn btn-primary">Save Fabric Color</button>
                        </div>
                    </form>

                </div>
                @endcan


                <div class="card fabric_color_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Update Fabric Color</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_color" class="col-md-4 col-form-label text-md-end">Fabric Color</label>
                                <div class="col-md-7">

                                    <input id="fabric_color_edit" type="text" class="form-control"
                                           placeholder="Enter fabric color">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-fabric-color" class="btn btn-secondary">Cancel</button>
                            <button id="btn-update-fabric-color" class="btn btn-primary">Update Fabric Color</button>
                        </div>
                    </form>


                </div>

            </div>


        </div>
    </div>
@endsection


