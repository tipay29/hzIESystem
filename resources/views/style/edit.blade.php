@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <h5 class="mt-2">{{__('text.Edit') .' '. __('text.Style')}}</h5>

                        <div>

                            {{--                            <a href="{{route('purchase-orders.create')}}"--}}
                            {{--                               class="btn btn-outline-success float-right">--}}
                            {{--                                Add Purchase Order </a>--}}

                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{route('styles.update',$style->id)}}" method="post">

                            @method('PATCH')

                            @include('style.form')

                            @csrf
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">{{__('text.Update') .' '. __('text.Style')}}</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>


    </div>

@endsection
