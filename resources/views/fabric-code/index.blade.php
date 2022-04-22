@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-around fabric_code_row">
            <div class="col-md-5 ">
                <div class="card fabric_code_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Fabric Codes</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id="fabric-code-container">

                            <table class="table fabric_code_table">
                                <thead>
                                <tr>
                                    <th width="20%">ID</th>
                                    <th width="70%">Code</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($fabric_codes as $key => $fabric_code)
                                    <tr>
                                        <td>{{ $fabric_code->id }}</td>
                                        <td>{{ $fabric_code->fabric_code }}</td>
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
                <div class="card fabric_code_div_two">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Add Fabric Code</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_code_create" class="col-md-4 col-form-label text-md-end">Fabric Code</label>
                                <div class="col-md-7">

                                    <input id="fabric_code_create" type="text" class="form-control"
                                           placeholder="Enter fabric code">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button id="btn-save-fabric-code" class="btn btn-primary">Save Fabric Code</button>
                        </div>
                    </form>

                </div>


                <div class="card fabric_code_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Update Fabric Code</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="fabric_code_edit" class="col-md-4 col-form-label text-md-end">Fabric Code</label>
                                <div class="col-md-7">

                                    <input id="fabric_code_edit" type="text" class="form-control"
                                           placeholder="Enter fabric code">

                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-fabric-code" class="btn btn-secondary">Cancel</button>
                            <button id="btn-update-fabric-code" class="btn btn-primary">Update Fabric Code</button>
                        </div>
                    </form>


                </div>

            </div>


    </div>
@endsection
