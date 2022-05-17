@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-around production_event_row">
            <div class="col-md-7 ">
                <div class="card production_event_div_one">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Production Events</h5>

                        <div>



                        </div>

                    </div>

                    <div class="card-body">
                        <div id="production-event-container">

                            <table class="table production_event_table">
                                <thead>
                                <tr>
                                    <th width="20%">ID</th>
                                    <th width="20%">Event</th>
                                    <th width="20%">Date</th>
                                    <th width="20%">Work Hour</th>
                                    <th width="20%">Building</th>
                                    @can('create',App\Models\ProductionEvent::class)
                                        <th>{{__('text.Option')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($production_events as $key => $production_event)
                                    <tr>
                                        <td>{{ $production_event->id }}</td>
                                        <td>{{ $production_event->event }}</td>
                                        <td >{{$production_event->special_date}}</td>
                                        <td >{{$production_event->work_hour}}</td>
                                        <td >{{$production_event->bldg}}</td>
                                        @can('update',$production_event)
                                            <td>
                                                <button type='button' style="text-decoration: none;
                                                color:darkorange;border:none;padding:0px;background-color: white;"
                                                        class="btn_edit_production_event" value="{{$production_event->id}}">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                                <button type='button' style="text-decoration: none;
                                                border: none;background-color: white;color:darkred;padding:0px;"
                                                        class="btn_delete_production_event" value="{{$production_event->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> </button>


                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    {{$production_events->render("pagination::bootstrap-4")}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 ">
                @can('create',App\Models\ProductionEvent::class)
                    <div class="card production_event_div_two">
                        <div class="card-header d-flex justify-content-between">

                            <h5 class="mt-2">Add Production Event</h5>

                            <div>



                            </div>

                        </div>

                        <form action="">
                            <div class="card-body">

                                @csrf
                                <div class="row mb-3">
                                    <label for="production_event_create" class="col-md-4 col-form-label text-md-end">Production Event</label>
                                    <div class="col-md-7">

                                        <input id="production_event_create" type="text" class="form-control"
                                               placeholder="Enter event">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="special_date_create" class="col-md-4 col-form-label text-md-end">Date</label>
                                    <div class="col-md-7">

                                        <input id="special_date_create" type="date" class="form-control"
                                               >

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="work_hour_create" class="col-md-4 col-form-label text-md-end">Work Hours</label>
                                    <div class="col-md-7">

                                        <input id="work_hour_create" type="number" class="form-control"
                                               placeholder="Enter work hours">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="bldg_create" class="col-md-4 col-form-label text-md-end">Buildings</label>
                                    <div class="col-md-7">

                                        <input id="bldg_create" type="text" class="form-control"
                                               placeholder="Enter buildings">

                                    </div>
                                </div>


                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button id="btn-save-production-event" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>

                    </div>
                @endcan


                <div class="card production_event_div_three">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Update Production Event</h5>

                        <div>



                        </div>

                    </div>

                    <form action="">
                        <div class="card-body">

                            @csrf
                            <div class="row mb-3">
                                <label for="production_event_edit" class="col-md-4 col-form-label text-md-end">Production Event</label>
                                <div class="col-md-7">

                                    <input id="production_event_edit" type="text" class="form-control"
                                           placeholder="Enter event">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="special_date_edit" class="col-md-4 col-form-label text-md-end">Date</label>
                                <div class="col-md-7">

                                    <input id="special_date_edit" type="date" class="form-control" step="0.01"
                                           >

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="work_hour_edit" class="col-md-4 col-form-label text-md-end">Work Hours</label>
                                <div class="col-md-7">

                                    <input id="work_hour_edit" type="number" class="form-control"
                                           placeholder="Enter work hours">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bldg_edit" class="col-md-4 col-form-label text-md-end">Buildings</label>
                                <div class="col-md-7">

                                    <input id="bldg_edit" type="text" class="form-control"
                                           placeholder="Enter buildings">

                                </div>
                            </div>



                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button id="btn-create-production-event" class="btn btn-secondary">{{__('text.Cancel')}}</button>
                            <button id="btn-update-production-event" class="btn btn-primary">Update Event</button>
                        </div>
                    </form>


                </div>

            </div>

        </div>
@endsection
