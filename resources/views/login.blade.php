<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('login.title')</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</head>

<body>
    <div class="parent-container">
        <div class="content-container">
            <div class="title-text">
                @lang('login.title')
            </div>
            <form action="{{ route('login') }}" method="POST" class="form-container">
                @csrf
                <div class="login-text">@lang('login.form_title')</div>

                <div class="form-floating">
                    <input type="email" id="email" name="email" placeholder="@lang('login.email')"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    <label for="email">@lang('login.email')</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" id="password" name="password" placeholder="@lang('login.password')"
                        class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                        required>
                    <label for="password">@lang('login.password')</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        @lang('login.remember_me')
                    </label>
                </div>

                <button type="submit" class="main-button primary-bg-color">@lang('login.submit')</button>

                <a href="/register">
                    <button type="button" class="main-button secondary-bg-color">@lang('login.create_account')</button>
                </a>
            </form>
        </div>
        <img class="bg"
            src="https://www.homage.com.my/wp-content/uploads/sites/2/2022/06/Blood-Donor-Privileges-Malaysia.png"
            alt="">
        <div class="black-bg"></div>
    </div>
</body>

</html>