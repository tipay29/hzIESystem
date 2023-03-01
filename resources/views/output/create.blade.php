@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Output List</h5>

                        <div>




                        </div>

                    </div>

                    <div class="card-body cut-container">



                        <form>

                            <div class="row my-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Building</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                            <option>F</option>
                                            <option>K</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Line</label>
                                        <input type="number" maxlength="2" class="form-control" id="output_line"
                                               aria-describedby="emailHelp" placeholder="Enter Line Number">

                                    </div>
                                </div>

                                <div class="col-md-3">

                                </div>

                                <div class="col-md-3">
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input checked class="form-check-input" type="checkbox" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    8 Hours
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                <label class="form-check-label" for="defaultCheck2">
                                                    10 Hours
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>






                            <div class="row my-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">New Hire</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Resign</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Absent</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Leave</label>
                                        <select  class="form-control" id="exampleFormControlSelect2">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>


                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <label for="po">PO</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="po">Color Code</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="po">Size</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="po">Style</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="po">Description</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="po">Output</label>
                                </div>

                            </div>

                            @for($i = 0; $i < 10; $i++)
                                <div class="row mb-1">
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <input id="po" name='po' type="number" class="form-control"
                                                   placeholder="Enter PO">

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <input id="color_code" name='color_code' type="number" class="form-control"
                                                   placeholder="Enter Colorcode">

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <input id="size" name='size' type="number" class="form-control"
                                                   placeholder="Enter Size">

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <input id="style_desc" name='style_desc' type="text" class="form-control"
                                                   placeholder="Enter Description">

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <input id="style_name" name='style_name' type="number" class="form-control"
                                                   placeholder="Enter Style">

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <input id="output" name='output' type="number" class="form-control"
                                                   placeholder="Enter Output">

                                        </div>
                                    </div>





                                </div>

                            @endfor




                            <button id="output_next" type="next" class="btn btn-primary my-3">Next</button>
                            <button type="finish" class="btn btn-primary my-3">Finish</button>


                        </form>







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

