@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

         <h1 class="mb-5">Welcome to Horizon IE System</h1>

            <a href="{{ asset('storage/files/ExcelLesson1.xlsx') }}" download
               style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                    border: 2px solid darkgrey;"

            > ExcelLesson1 </a>

            <a href="{{ asset('storage/files/ExcelLesson2.xlsx') }}" download
               style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                    border: 2px solid darkgrey;"

            > ExcelLesson2 </a>

            <a href="{{ asset('storage/files/ExcelLesson3.xlsx') }}" download
               style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                    border: 2px solid darkgrey;"

            >ExcelLesson3 </a>

             <a href="{{ asset('storage/files/ExcelExam1.xlsx') }}" download
            style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                    border: 2px solid darkgrey;"

            >ExcelExam1 </a>


            <a href="{{ asset('storage/files/ExcelExam2.xlsx') }}" download
            style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                    border: 2px solid darkgrey;"

            >ExcelExam2 </a>

            <a href="{{ asset('storage/files/ExcelExam3.xlsx') }}" download
               style="background-color: green;color:white;padding:5px;text-decoration: none;margin:5px;
                    border: 2px solid darkgrey;"

            > ExcelExam3 </a>




            <form action="{{route('upload.excel')}}" method="post" enctype="multipart/form-data"
                  class="dropzone dz-clickable mt-2" id="upload-one">
                @csrf

                <div>


                    <h4 class="text-center"> do not forget to put your name </h4>
                </div>

                <div class="dz-default dz-message">

                    <h1> Please DROP here or CLICK&CHOOSE the excel file</h1>
                </div>
                <h4 class="text-center"> when you are done</h4>

            </form>






{{--            <img src="{{ asset('storage/images/pl.png') }}" alt="">--}}
{{--            <div></div>--}}
{{--            <img src="{{ asset('storage/images/pll.png') }}" alt="">--}}

        </div>
    </div>
</div>
@endsection
