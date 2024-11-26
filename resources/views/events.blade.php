<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Events</title>
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</head>
@extends('master')
@section('content')

<body>
    <section id="heroCarousel" class="carousel slide container" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($events->take(10) as $index => $event)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                    class="@if($index == 0) active @endif" aria-current="@if($index == 0) true @else false @endif"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($events->take(10) as $index => $event)
                <div class="carousel-item @if($index == 0) active @endif">
                    <div class="hero-section text-center text-light d-flex align-items-center"
                        style="background-image: url('{{ $event->image_url }}'); background-size: cover; background-position: center; height: 500px;">
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <div class="container my-5">
        <h2 class="mb-4">Upcoming Events</h2>
        <div class="row">

            @foreach ($events as $event)
                <a href="{{route('event', $event->id)}}" class="col-md-4 text-decoration-none">
                    <div class="">
                        <div class="card mb-4 event-card">
                            <img src="{{ $event->image_url }}" class="card-img-top" alt="{{ $event->events }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->events }}</h5>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt"></i> {{ $event->date }} &nbsp;
                                        <i class="far fa-clock"></i> {{ $event->time_start }} - {{ $event->time_end }}
                                    </small>
                                </p>

                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
@endsection

</html>