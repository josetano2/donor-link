@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<a href="/events">
    <div class="jumbotron-container">
        <img src="https://dam.northwell.edu/m/6e4d42b8cdaff73e/Drupal-TheWell_blood-donation_AS_567403348.jpg" alt=""
            class="jumbotron-image">
        <div class="black-bg"></div>
        {{-- <div class="left-gradient"></div> --}}
        <div class="top-left-div">
            @lang('start_blood_donor_journey')
        </div>
        <div class="sub-jumbotron-text">
            @lang('see_upcoming_events')
        </div>

        {{-- <a href="/events"><button type="submit" class="jumbotron-button primary-bg-color">See Upcoming
                Events!</button></a> --}}
    </div>
</a>

<div class="sub-jumbotron-container">
    <a href="/tracker">

        <div class="small-jumbotron-container">

            <img src="https://ichef.bbci.co.uk/ace/standard/976/cpsprodpb/182FF/production/_107317099_blooddonor976.jpg.webp"
                alt="" class="jumbotron-image">
            <div class="black-bg"></div>
            <div class="sub-jumbotron-text">
                @lang('track_your_events')
            </div>
        </div>
    </a>
    <a href="/request">
        <div class="small-jumbotron-container">

            <img src="https://www.cidrap.umn.edu/sites/default/files/styles/article_detail/public/article/iStock-1399755086.jpg?itok=eWZa9PaM"
                alt="" class="jumbotron-image">
            <div class="black-bg"></div>
            <div class="sub-jumbotron-text">
                @lang('request_donors')
            </div>
        </div>
    </a>
</div>

@endsection