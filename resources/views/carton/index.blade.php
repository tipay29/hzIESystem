@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">Carton Lists</h5>

                        <div>

                            <a href="{{route('cartons.create')}}"
                               class="btn btn-outline-success"
                            >Add Carton</a>
                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                Back</a>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                <tr>
                                    <th width="8%" scope="col">Carton ID </th>
                                    <th width="28%" scope="col">Carton Brand </th>
                                    <th width="28%" scope="col">Carton Size <br> L*W*H</th>
                                    <th width="28%" scope="col">Carton Weight </th>
                                    <th width="28%" scope="col">Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($cartons as $carton)
                                        <tr>
                                            <td width="8%" scope="col">{{$carton->id}} </td>
                                            <td width="28%" scope="col">{{$carton->brand->brand_name}} </td>
                                            <td width="28%" scope="col">{{$carton->ctn_size}} </td>
                                            <td width="28%" scope="col">{{number_format((float)$carton->ctn_weight, 2, '.', '')}} </td>
                                            <td width="8%" scope="col">

                                                <a style="text-decoration: none;color:darkorange;" href="{{route('cartons.edit', $carton->id)}}" >
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>

                                                <form style="display:inline;" action="{{route('cartons.destroy', $carton->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border: none;background-color: white;color:darkred;"
                                                            onclick="return confirm('Delete Carton #{{$carton->id}} ?')" >
                                                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty

                                        <h3 class="text-danger">No record of Carton!</h3>

                                    @endforelse


                                </tbody>


                            </table>

                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                {{$cartons->withQueryString()->onEachSide(2)->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

