<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@lang('profile.title')</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</head>
@extends('master')
@section('content')

<body>
    <div class="container">
        <div class="profile-header mt-5">
            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data"
                class="text-center">
                @csrf
                <div class="form-group">
                    <label for="photo">
                        <img src="{{ Auth::user()->profile_url }}" class="profile-image mb-2" alt="@lang('profile.user_image')"
                            width="150" height="150" style="cursor: pointer;">
                    </label>
                    <input type="file" name="photo" id="photo" class="form-control-file d-none"
                        onchange="this.form.submit()">
                </div>
            </form>
        </div>

        <div class="card profile-info shadow-sm p-4 mb-5 bg-white rounded">
            <div class="card-body text-center">
                <h2 class="card-title mb-3">{{ Auth::user()->name }}</h2>
                <p class="card-text"><span class="info-label">@lang('profile.email'):</span> {{ Auth::user()->email }}</p>
                <p class="card-text"><span class="info-label">@lang('profile.dob'):</span> {{ Auth::user()->dob }}</p>
                <p class="card-text"><span class="info-label">@lang('profile.blood_type'):</span> {{ Auth::user()->bloodType->type }}</p>
                <p class="card-text"><span class="info-label">@lang('profile.gender'):</span> {{ Auth::user()->gender }}</p>
            </div>
        </div>
    </div>
</body>
@endsection

</html>
