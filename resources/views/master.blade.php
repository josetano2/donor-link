<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Link</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
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
            <a>Home</a>
            <a>Events</a>
            <a>History</a>
            <a>About</a>
        </div>
        <div class="right-container">
            <button type="button">Sign In</button>
            <button type="button">Register</button>


        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
