<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPK Bimbel</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('assets/login/css/all')}}"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{url('assets/login/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/login/css/now-ui-dashboard.minaa26.css?v=1.5.0')}}" rel="stylesheet" />
    {{-- Sweetalert --}}
    <script src="{{ url('assets/js/sweetalert2.min.js')}}"></script>
    <link rel="icon" type="image/png" href="{{ url('assets/images/favicon.png') }}">
    <link href="{{ url('assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
    

</head>
<body class="login-page sidebar-mini">
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        {{-- <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    @yield('content')

    <!--   Core JS Files   -->
    <script src="{{url('assets/login/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/login/js/popper.min.js')}}"></script>
    <script src="{{url('assets/login/js/bootstrap.min.js')}}"></script>
    {{-- <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/js/plugins/moment.min.js"></script> --}}

    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{url('assets/login/js/demo.js')}}"></script>
    <script>
        $(document).ready(function () {
            demo.checkFullPageBackgroundImage();
        });
    </script>

</body>
</html>
