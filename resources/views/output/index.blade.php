@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Output List</h5>

                        <div>

                            <a href="{{route('outputs.create')}}"
                               class="btn btn-outline-success">
                                Add Output</a>


                        </div>

                    </div>

                    <div class="card-body cut-container">




                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Bldg</th>
                                <th scope="col">Line</th>
                                <th scope="col">Style</th>
                                <th scope="col">Description</th>
                                <th scope="col">Fty PO</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Output</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>





{{--                        <div class="row">--}}
{{--                            <div class="col-12 d-flex justify-content-center ">--}}
{{--                                {{$cuts->withQueryString()->onEachSide(2)->links()}}--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

