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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" placeholder="@lang('register.name')">
                    <label for="name">@lang('register.name')</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ old('email') }}" placeholder="@lang('register.email')">
                    <label for="email">@lang('register.email')</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="@lang('register.password')">
                    <label for="password">@lang('register.password')</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob"
                        value="{{ old('dob') }}" placeholder="mm/dd/yyyy">
                    <label for="dob">@lang('register.dob')</label>
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <select class="form-select @error('blood_type') is-invalid @enderror" name="blood_type">
                    <option value="" disabled selected>@lang('register.blood_type')</option>
                    @foreach ($blood_types as $bt)
                        <option value="{{ $bt->id }}" {{ old('blood_type') == $bt->id ? 'selected' : '' }}>
                            {{ $bt->type }}
                        </option>
                    @endforeach
                </select>
                @error('blood_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                    <option value="" disabled selected>@lang('register.gender')</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>@lang('register.gender_male')
                    </option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                        @lang('register.gender_female')</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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