<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pagename')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body,
        html {
            margin: 0;
        }

        main {
            margin-top: 54.93px;
            min-height: calc(100vh - (55.85px * 2));
        }

        .welcome,
        .request_report,
        .research_reports,
        .portfolio {
            min-height: 400px;
            position: relative;
            opacity: 0.65;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .welcome {
            background-image: url("images/welcome.jpg");
        }

        .request_report {
            background-image: url("images/request_report.jpg");
        }

        .research_reports {
            background-image: url("images/research_reports.jpg");
        }

        .portfolio {
            background-image: url("images/portfolio.jpg");
        }

        .caption {
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            text-align: center;
            color: #000;
        }

        .caption span.border {
            background-color: #111;
            color: #fff;
            padding: 18px;
            font-size: 25px;
            letter-spacing: 10px;
        }

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {

            .welcome,
            .request_report,
            .research_reports,
            .portfolio {
                background-attachment: scroll;
            }
        }

        .card {
            min-height: 100%;
        }

        .index_card:hover {
            border: solid #43658B 1px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            color: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        .blur {
            -webkit-filter: blur(20px);
            -moz-filter: blur(20px);
            -o-filter: blur(20px);
            -ms-filter: blur(20px);
            filter: blur(20px);
            opacity: 0.8;
            width: 100%;
            height: 100%;
            /* position: absolute; */
            background: #ccc;
            display: block;
            pointer-events: none;
        }

        .admin-nav .active {
            text-decoration: underline;
            font-weight: bold;
            font-size: 120%;
        }
    </style>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="fixed-top">
            <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Halal Investings
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
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Home</a>
                            </li>
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
                            <li class="nav-item">
                                <a class="nav-link" href="/my_requests">My Requests</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            <!-- for sucess -->
            @if( session('success') )
            <div class="alert alert-dismissible alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Great!</strong> {{session('success')}}
            </div>
            @endif

            @if( session('errormsg') )
            <!-- for personal error message -->
            <div class="alert alert-dismissible alert-danger text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> {{ session('errormsg') }}
            </div>
            @endif

            @if(( Session::get('errors') ?? 0 ))
            <!-- for error in a form -->
            <div class="alert alert-dismissible alert-danger text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> There was a error! Please change a few things up and try submitting again.
            </div>
            @endif
        </div>


        <main class="">
            <div class="">
                @yield('content')
            </div>
        </main>

        <footer>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <div class="ml-auto" id="navbarColor01">
                        <ul class="navbar-nav d-flex flex-row justify-content-between">
                            <li class="nav-item">
                                <a class="nav-link" href="/contact_us">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/desclaimer">Desclaimer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faq">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about_us">About us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </footer>

    </div>
</body>

</html>