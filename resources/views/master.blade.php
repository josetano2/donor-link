<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Link</title>
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
            <a class="logo-text">Donor Link</a>
        </div>
        <div class="middle-container">
            <a class="nav-text" href="{{route('home')}}">Home</a>
            <a class="nav-text" href="{{route('events')}}">Events</a>
            <a class="nav-text">History</a>
            <a class="nav-text">About</a>
        </div>
        {{-- nanti ada validasi buat button/profile --}}
        <div class="right-container">
            @auth
                <div class="dropdown">
                    <button class="main-button
                    primary-bg-color dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout.account') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login"><button type="button" class="main-button primary-bg-color">Login</button></a>
                <a href="/register">
                    <button type="button" class="main-button secondary-bg-color">
                        Register
                    </button>
                </a>
            @endauth
        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>

</html>