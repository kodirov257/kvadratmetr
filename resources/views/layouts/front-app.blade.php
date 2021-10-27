<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    Styles --}}
    <link rel="stylesheet" type="text/css" href="{{asset('./assets/user-front/assets/leaflet/leaflet.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('./assets/user-front/assets/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('./assets/user-front/assets/css/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('./assets/user-front/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('./assets/user-front/assets/css/responsive.css')}}">

    <title>Kvadratmetr</title>
@yield('meta')

</head>
<body id="app">
<div class="wrapper">
    <header class="main-header">
        <div class="container">
            <a href="/" class="logo"><img src="{{asset('assets/img/logo.svg')}}" alt="Kvadrat metr logo"></a>
            <nav class="main-nav">
                <div id="menu" class="links">
                    <a href="/developer" class="main-nav-link">Developers</a>
                    <a href="/about" class="main-nav-link">About us</a>
                    <a href="/advertisement" class="main-nav-link">Advertising</a>
                    <a id="navLinkBtn" href="contact" class="main-nav-link btn">Contact</a>
                </div>
                <div class="lang">
                    <button class="lang-toggle">EN</button>
                    <div class="lang-items">
                        <a href="#" class="lang-link">EN</a>
                        <a href="#" class="lang-link">RU</a>
                        <a href="#" class="lang-link">UZ</a>
                    </div>
                </div>
                <button class="menu_toggle"><span class="bar"></span></button>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="main-footer">
        <div class="container">
            <div class="main-footer-box">
                <div class="row align-items-end">
                    <div class="col-md-4 col-sm-12">
                        <a href="index.html" class="logo"><img src="./assets/img/logo.svg" alt="logo image"></a>
                        <div class="foot-descriptions">
                            <h5 class="title">About this Site</h5>
                            <p class="paragraph">The primary real estate market is growing and developing. Time shows
                                that the success of a business.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="foot-contacts">
                            <h2 class="title">Contact us</h2>
                            <a href="tel:+998781507779"><i class="icon-phone"></i>+998 (78) 150-77-79</a>
                            <a href="https://www.kvadratmetr.uz" target="_blank"><i class="icon-earth"></i>https://www.kvadratmetr.uz</a>
                            <a href="mailto:info@kvadratmetr.uz"><i class="icon-at"></i>info@kvadratmetr.uz</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <address class="foot-location"><i class="icon-map"></i><span>31/2, st. H.Olimjan, Mirzo Ulugbek district, 2-floor, 1-room</span>
                        </address>
                        <div class="foot-social">
                            <span>Follow as:</span>
                            <a href="#" class="facebook"><i class="icon-facebook"></i></a>
                            <a href="#" class="instagram"><i class="icon-instagram"></i></a>
                            <a href="#" class="telegram"><i class="icon-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

{{--    <header>--}}
{{--        <nav class="navbar navbar-expand-md navbar-dark">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    Projects--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}
{{--                        @foreach (array_slice($menuPages, 0, 3) as $page)--}}
{{--                            <li><a class="nav-link" href="{{ route('page', page_path($page)) }}">{{ $page->getMenuTitle() }}</a></li>--}}
{{--                        @endforeach--}}
{{--                        @if ($morePages = array_slice($menuPages, 3))--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    More... <span class="caret"></span>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    @foreach ($morePages as $page)--}}
{{--                                        <a class="dropdown-item" href="{{ route('page', page_path($page)) }}">{{ $page->getMenuTitle() }}</a>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>--}}
{{--                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('admin.home') }}">Admin</a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('cabinet.home') }}">Cabinet</a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                       document.getElementById('logout-form').submit();">--}}
{{--                                        Logout--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        @section('search')--}}
{{--            @include('layouts.partials.search', ['category' => null, 'route' => route('projects.index')])--}}
{{--        @show--}}
{{--    </header>--}}

{{--    <main class="app-content py-3">--}}
{{--        <div class="container">--}}
{{--            @section('breadcrumbs', Breadcrumbs::render())--}}
{{--            @yield('breadcrumbs')--}}
{{--            @include('layouts.partials.flash')--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </main>--}}

{{--    <footer>--}}
{{--        <div class="container">--}}
{{--            <div class="border-top pt-3">--}}
{{--                <p>&copy; {{ date('Y') }} - Projects</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}

<!-- Scripts -->
<script src="{{asset('./assets/user-front/assets/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0=" crossorigin="anonymous"></script>
<script src="{{asset('./assets/user-front/assets/js/slick.min.js')}}"></script>
<script src="{{asset('./assets/user-front/assets/js/main.js')}}"></script>
@yield('scripts')
</body>
</html>
