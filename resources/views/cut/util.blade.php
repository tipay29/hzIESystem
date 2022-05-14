@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center cut-section-h1-to-print">Cutting Utilization Report</h1>

        <div class="d-flex justify-content-center ">

            <select class="cut-section-bldg-to-print" name="building" id="cut_util_building" >
                <option value="0" selected>ALL</option>
                <option value="2">B2</option>
                <option value="4">D4</option>
                <option value="5">E5</option>
            </select>

            <input class="cut-section-start-to-print" type="date" id="cut_util_start_date">
            <input class="cut-section-end-to-print" type="date" id="cut_util_end_date">


        </div>



        <div class="row justify-content-center">


                <div class="col-md-10 mt-5 cut-all-b2">

                    <div class="card ">

                        <div class="card-header d-flex justify-content-between">

                            <h5 class="mt-2">Building B2</h5>

                            <div>

                                <a id="print-cut-b2" href="#"
                                   class="btn btn-outline-success section-to-no-print">
                                     Print </a>

                            </div>
                        </div>

                        <div class="card-body cut-util-body">

                                <div class="table-responsive ">

                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Table#</th>
                                            <th scope="col">Days</th>
                                            <th scope="col">Work Hours</th>
                                            <th scope="col">Actual Yards</th>
                                            <th scope="col">Target Days</th>
                                            <th scope="col">Target Work Hours</th>
                                            <th scope="col">Target Yards</th>
                                            <th scope="col">Table Util</th>
                                        </tr>
                                        </thead>
                                        <tbody class="cut-util-table-b2">
                                        </tbody>
                                    </table>

                                </div>

                        </div>

                        <div class="card-footer d-flex justify-content-around hide">

                            <div>
                                <strong>Prepared by</strong>
                                <br>
                                <br>
                                <p style="border-top:1px solid black; display: inline;">Cutting Staff</p>
                            </div>
                            <div>
                                <strong>Noted by</strong>
                                <br><br>
                                <p style="border-top:1px solid black; display: inline;">Cutting Supervisor</p>

                            </div>
                        </div>

                    </div>


                </div>




            <div class="col-md-10 mt-5 cut-all-d4">

                <div class="card ">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Building D4</h5>

                        <div>

                            <a href="#" id="print-cut-d4"
                               class="btn btn-outline-success section-to-no-print">
                                Print </a>

                        </div>
                    </div>

                    <div class="card-body cut-util-body-d4">


                        <div class="table-responsive cut-table-all-d4">

                            <table class="table ">
                                <thead>
                                <tr>
                                            <th scope="col">Table#</th>
                                            <th scope="col">Days</th>
                                            <th scope="col">Work Hours</th>
                                            <th scope="col">Actual Yards</th>
                                            <th scope="col">Target Days</th>
                                            <th scope="col">Target Work Hours</th>
                                            <th scope="col">Target Yards</th>
                                            <th scope="col">Table Util</th>
                                </tr>
                                </thead>
                                <tbody class="cut-util-table-d4">
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-around hide">

                        <div>
                            <strong>Prepared by</strong>
                            <br>
                            <br>
                            <p style="border-top:1px solid black; display: inline;">Cutting Staff</p>
                        </div>
                        <div>
                            <strong>Noted by</strong>
                            <br><br>
                            <p style="border-top:1px solid black; display: inline;">Cutting Supervisor</p>

                        </div>
                    </div>

                </div>


            </div>





            <div class="col-md-10 mt-5 cut-all-e5">

                <div class="card ">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Building E5</h5>

                        <div>

                            <a href="#" id="print-cut-e5"
                               class="btn btn-outline-success section-to-no-print">
                                Print </a>

                        </div>
                    </div>

                    <div class="card-body cut-util-body-e5">


                        <div class="table-responsive cut-table-all-e5">

                            <table class="table ">
                                <thead>
                                <tr>
                                            <th scope="col">Table#</th>
                                            <th scope="col">Days</th>
                                            <th scope="col">Work Hours</th>
                                            <th scope="col">Actual Yards</th>
                                            <th scope="col">Target Days</th>
                                            <th scope="col">Target Work Hours</th>
                                            <th scope="col">Target Yards</th>
                                            <th scope="col">Table Util</th>
                                </tr>
                                </thead>
                                <tbody class="cut-util-table-e5">
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-around hide" >

                        <div>
                            <strong>Prepared by</strong>
                            <br>
                            <br>
                            <p style="border-top:1px solid black; display: inline;">Cutting Staff</p>
                        </div>
                        <div>
                            <strong>Noted by</strong>
                            <br><br>
                            <p style="border-top:1px solid black; display: inline;">Cutting Supervisor</p>

                        </div>
                    </div>

                </div>


            </div>



        </div>
    </div>
@endsection
