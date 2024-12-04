<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('navbar.logo') }}</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.scss') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</head>

<body class="parent-container">
    <div class="navbar-container">
        <div class="left-container">
            <img src="logo.png" alt="">
            <a class="logo-text">{{ __('navbar.logo') }}</a>
        </div>
        <div class="middle-container">
            <a class="nav-text {{ Request::is('/') ? 'active' : '' }}"
                href="{{ route('home') }}">{{ __('navbar.home') }}</a>
            <a class="nav-text {{ Request::is('events*') ? 'active' : '' }}"
                href="{{ route('events') }}">{{ __('navbar.events') }}</a>
            <a class="nav-text {{ Request::is('tracker*') ? 'active' : '' }}"
                href="{{ route('tracker') }}">{{ __('navbar.tracker') }}</a>
            <a class="nav-text {{ Request::is('request*') ? 'active' : '' }}"
                href="{{ route('request') }}">{{ __('navbar.request') }}</a>
        </div>
        <div class="right-container">
            @auth
                <div class="dropdown">
                    <button class="main-button primary-bg-color dropdown-toggle" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{route('profile')}}">{{ __('navbar.profile') }}</a>
                        </li>
                        <li>
                            <form action="{{ route('logout.account') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('navbar.logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login"><button type="button"
                        class="main-button primary-bg-color">{{ __('navbar.login') }}</button></a>
                <a href="/register">
                    <button type="button" class="main-button secondary-bg-color">
                        {{ __('navbar.register') }}
                    </button>
                </a>
            @endauth
            <div class="dropdown">
                <button class="main-button secondary-bg-color dropdown-toggle" type="button" id="languageDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('navbar.language') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    <li><a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'en']) }}">English</a></li>
                    <li><a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'ja']) }}">Japanese</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="section-container">
        @yield('content')
    </div>
</body>

</html>
