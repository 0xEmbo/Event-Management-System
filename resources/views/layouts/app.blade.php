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

    @yield('css')


</head>

<body id="page-top">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="header-navbar">
                <a class="navbar-brand" href="/" id="home">Home</a>
            </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 no-bullets">
                    <li class="nav-item dropdown">
                        <a class="btn navbar-brand event_btn" href="#">Events
                            <div class="dropdown-content">
                                <a href="#">Category 1</a>
                                <a href="#">Category 2</a>
                                <a href="#">Category 3</a>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn navbar-brand nav-links" href="#">About Us</a>
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
                            <a class="btn btn-primary btn-lg navbar-brand" href="#" id="btn-ce">Create Event</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="btn navbar-brand nav-links" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    </nav>

    @yield('content')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>

</body>
</html>
