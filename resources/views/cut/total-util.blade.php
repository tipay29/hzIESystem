@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <div class="mt-2">
                            <h5 class="d-inline">Total Cut Utilization</h5>
                            <input type="date" id="cut-total-util-start-date">
                            <input type="date" id="cut-total-util-end-date">
                        </div>


                        <div>

                            <a href="#"
                               class="btn btn-outline-success">
                                Push     </a>



                        </div>

                    </div>

                    <div class="card-body">


                        <div class="table-responsive">

                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col">Spread Date</th>
                                    <th scope="col">Building</th>
                                    <th scope="col">Round SUM Actual Yards</th>
                                    <th scope="col">AVG Work Hours</th>
                                    <th scope="col">SUM Actual Yards</th>
                                    <th scope="col">AVG Work Hours</th>
                                    <th scope="col">Target Yards</th>
                                    <th scope="col">Table Utilization</th>
                                    <th scope="col">Max Date</th>
                                    <th scope="col">Min Date</th>
                                    <th scope="col">Operation</th>
                                    <th scope="col">Days</th>
                                    <th scope="col">AVG Work Hours</th>
                                    <th scope="col">Round SUM Target Yards</th>
                                    <th scope="col">Total Table</th>
                                    <th scope="col">Total Table</th>
                                    <th scope="col">Total Table</th>
                                    <th scope="col">SUM Target Yards</th>
                                </tr>
                                </thead>
                                <tbody class="cut-total-util-table">
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
