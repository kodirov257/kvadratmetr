<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('./assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('./assets/css/responsive.css')}}">

    <title>Projects</title>
@yield('meta')

<!-- Styles -->
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
</head>
<body id="app">
<div class="wrapper">
<header class="header">
    <div class="row align-items-center justify-content-between">
        <div class="col-3 wid-345">
            <div class="header-logo"><img class="header-logo__image" src="{{asset('./assets/img/Logo.svg')}}" alt="logotip image"></div>
        </div>
        <div class="col-auto">
            @section('breadcrumbs', Breadcrumbs::render())
            @yield('breadcrumbs')
        </div>
        <div class="col">
            <div class="header-profile">
                <div class="header-profile__search">
                    <i class="icon-search"></i>
                    <input type="text" class="header-profile__input">
                </div>
                <button class="header-profile__notifications"><i class="icon-ring"></i></button>
                <img class="header-profile__photo" src="{{asset('assets/img/profile-img.svg')}}">
            </div>
        </div>
    </div>
    <!-- <div class="header-panel">
    </div> -->
</header>
<sidebar class="sidebar">
    <div id="accordian" class="sidebar-mainbuttons">
        <ul class="show-dropdown">
            <li><a href="#"><i class="icon-dash-icon"></i>Dashboard</a></li>
            <li class="active">
                <a href="#"><i class="icon-content"></i>Content</a>
{{--                @dd($developer)--}}
                @if($developer)
                                <ul class="show-dropdown">
                                    <li class="active">
                                        <a href="#"><i class="icon-buildings"></i>{{$developer->name_en}}</a>
{{--                                        <ul class="show-dropdown">--}}
{{--                                            <li><a href="#">NRG Oybek</a></li>--}}
{{--                                            <li class="active"><a href="#">NRG Mirzo Ulugbek</a></li>--}}
{{--                                        </ul>--}}
                                    </li>
                                </ul>
                @endif
            </li>
            <li><a href="javascript:void(0);"><i class="icon-insight"></i>Insights</a></li>
            <li><a href="javascript:void(0);"><i class="icon-marketing"></i>Marketing</a></li>
            <li><a href="javascript:void(0);"><i class="icon-lead"></i>Lead Manager</a></li>
            <li class="sidebar__settings"><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
            <li class="sidebar__support"><a href="javascript:void(0);"><i class="icon-help"></i>Support</a></li>
        </ul>
    </div>
</sidebar>
@yield('content')
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
<script src="{{ mix('js/app.js', 'build') }}"></script>

<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0=" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
