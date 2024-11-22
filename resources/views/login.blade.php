<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

</head>
<body>
    <div class="parent-container">
        <div class="content-container">
            <div class="title-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
            </div>
            <form action="{{route('login.account')}}" method="POST" class="form-container">
                @csrf
                <div class="login-text">Login</div>
                <div class="form-floating">

                    <input type="email" id="email" name="email" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{old('email')}}" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">

                    <input type="password" id="password" name="password" placeholder="password"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{old('password')}}" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="password">Password</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                
                <button type="submit" class="main-button primary-bg-color">Login</button>
                
                <a href="/register">
                <button type="button" class="main-button secondary-bg-color">Create new account</button>
                </a>
            </form>


        </div>
        <img class="bg" src="https://www.homage.com.my/wp-content/uploads/sites/2/2022/06/Blood-Donor-Privileges-Malaysia.png" alt="">
        <div class="black-bg">

        </div>
    </div>



</body>
</html>
