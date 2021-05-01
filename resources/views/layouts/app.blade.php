<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chitkara University - Events</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>

<body>
    <div class="parallax"></div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="header-navbar">
                <a class="navbar-brand" href="/" id="home">Home</a>
            </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 no-bullets">
                    <li class="nav-item dropdown">
                        <a class="btn navbar-brand nav-links" href="#">Events
                            <div class="dropdown-content">
                                <a href="{{ route('categories.show', '1') }}">Category 1</a>
                                <a href="{{ route('categories.show', '2') }}">Category 2</a>
                                <a href="{{ route('categories.show', '3') }}">Category 3</a>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn navbar-brand nav-links" href="{{ route('aboutus') }}">About Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 no-bullets" id="right_navbar">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="btn navbar-brand nav-links" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn navbar-brand nav-links" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="btn btn-primary btn-lg navbar-brand" href="{{ route('events.create') }}" id="btn-ce">Create Event</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="btn navbar-brand nav-links" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                <div class="dropdown-content" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </a>
                        </li>
                    @endguest
                </ul>
        </div>
    </nav>
    @if(session()->has('message'))
    <div class="container">
        <br><br><br><h1 class="alert {{ session()->get('alert-class') }}" style="padding: 20px; margin:0px;">{{ session()->get('message') }}</h1>
    </div>
    @endif

    @yield('content')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
