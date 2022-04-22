<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('storage/js/jquery2.js')}}"></script>  {{--for chosen--}}
    <script src="{{asset('storage/js/chosen-jquery.js')}}"></script>{{--for chosen--}}
    <script src="{{ asset('storage/js/main.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/chosen.css') }}" rel="stylesheet">{{--for chosen--}}
    <link href="{{ asset('storage/css/one.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/cut.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/order.css') }}" rel="stylesheet">
    <style>

        .navbar-brand img{
            max-width: 100%;
            height: 27px;
            max-height: 132px;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('storage/images/horizonlogo.png') }}" alt="Horizon Outdoor">

{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                    src="{{ asset('storage/images/sample.mp4') }}"--}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">

                            <div class="btn-group dropdown">
                                <a class="nav-link btn btn-light" href="{{route('purchase-orders.index')}}">Orders</a>
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('fabric-colors.index')}}">Fabric Colors</a></li>
                                    <li><a class="dropdown-item" href="{{route('fabric-codes.index')}}">Fabric Codes</a></li>
                                    <li><a class="dropdown-item" href="{{route('fabric-types.index')}}">Fabric Types</a></li>
                                    <li><a class="dropdown-item" href="{{route('placements.index')}}">Placements</a></li>
                                </ul>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jackets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sewing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cuts.index')}}">Cutting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('employees.index')}}">Employee</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
