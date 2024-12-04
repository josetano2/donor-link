<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('register.title')</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</head>

<body>
    <div class="parent-container">
        <div class="content-container">
            <div class="title-text">
                @lang('register.title')
            </div>
            <form action="{{ route('register.store') }}" method="POST" class="form-container">
                @csrf

                <div class="login-text">@lang('register.form_title')</div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang('register.name')">
                    <label for="name">@lang('register.name')</label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="@lang('register.email')">
                    <label for="email">@lang('register.email')</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="@lang('register.password')">
                    <label for="password">@lang('register.password')</label>
                </div>

                <div class="form-floating">
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="mm/dd/yyyy">
                    <label for="dob">@lang('register.dob')</label>
                </div>

                <select class="form-select" name="blood_type">
                    <option value="" disabled selected>@lang('register.blood_type')</option>
                    @foreach ($blood_types as $bt)
                        <option value="{{ $bt->id }}">{{ $bt->type }}</option>
                    @endforeach
                </select>

                <select class="form-select" name="gender">
                    <option value="" disabled selected>@lang('register.gender')</option>
                    <option value="Male">@lang('register.gender_male')</option>
                    <option value="Female">@lang('register.gender_female')</option>
                </select>

                <button type="submit" class="main-button primary-bg-color">@lang('register.submit')</button>

                <a href="/login">
                    <button type="button" class="main-button secondary-bg-color">@lang('register.have_account')</button>
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