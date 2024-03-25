@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Style {{$style->style_code}}  Details</h5>


                        <div>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addSizeModal">
                                Add Info
                            </button>


                            @can('update',$style)
                                <a href="{{route('styles.edit', $style->id)}}"
                                   class="btn btn-outline-warning">
                                    Edit Style </a>
                            @endcan
                            @can('delete', $style)
                                <form style="display:inline;" action="{{route('styles.destroy', $style->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')" >Delete Style</button>
                                </form>
                            @endcan
                        </div>


                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">
                                <h5 class="text-white bg-secondary text-center"> Purchase Orders</h5>
                                    @forelse($style->purchase_orders as $purchase_order)
                                        {{$purchase_order->purchase_order}} ,
                                    @empty
                                        <p>No Purchase Order</p>
                                    @endforelse
                                <h5 class="text-white bg-secondary text-center"> Fabric Colors</h5>
                                    @forelse($style->fabric_colors as $fabric_color)
                                         {{$fabric_color->fabric_color}} ,
                                    @empty
                                        <p>No Fabric Color</p>
                                    @endforelse
                                <h5 class="text-white bg-secondary text-center"> Fabric Codes</h5>
                                    @forelse($style->fabric_codes as $fabric_code)
                                        {{$fabric_code->fabric_code}} ,
                                    @empty
                                        <p>No Fabric Code</p>
                                    @endforelse
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-white bg-secondary text-center"> Color Codes</h5>
                                    @forelse($style->placements as $placement)
                                        {{$placement->placement}} ,
                                    @empty
                                        <p>No Fabric Code</p>
                                    @endforelse
                                <h5 class="text-white bg-secondary text-center"> Fabric Types</h5>
                                    @forelse($style->fabric_types as $fabric_type)
                                        {{$fabric_type->fabric_type}} ,
                                    @empty
                                        <p>No Fabric Type</p>
                                    @endforelse
                            </div>
                        </div>

                        <h4 class="text-white bg-dark text-center"> Additional Information</h4>
                        <div class="table-responsive ">
                            <table class="table">

                                        <thead>
                                        <tr>
                                            <th width="20%" scope="col"> Size</th>
                                            <th width="20%" scope="col"> Weight</th>
                                            <th width="30%" scope="col"> Carton</th>
                                            <th width="20%" scope="col"> MCQ</th>
                                            <th width="10%" scope="col"> Del</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($style->sizes as $size)

                                            <tr>
                                                <td width="20%" scope="col">{{$size->size}}</td>
                                                <td width="20%" scope="col"> {{$size->pivot->weight}}</td>
                                                <td width="30%" scope="col">
                                                    @foreach($cartons as $carton)
                                                    {{$carton->id == $size->pivot->carton_id ? $carton->brand->brand_name . " " .  $carton->ctn_size : "" }}
                                                    @endforeach
                                                </td>
                                                <td width="20%" scope="col"> {{$size->pivot->mcq}}</td>
                                                <td width="10%" scope="col">

                                                    <form style="display:inline;" action="{{route('styles.destroymcq', $size->pivot->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none;background-color: white;color:darkred;"
                                                                onclick="return confirm('Delete Style MCQ #{{$size->pivot->id}} ?')" >
                                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>

                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                            </table>


                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
{{--                                    {{$employees->render("pagination::bootstrap-4")}}--}}
                                </div>
                            </div>

                        </div>




                    </div>





                </div>
            </div>
        </div>
    </div>

    @include('style.info');

@endsection
