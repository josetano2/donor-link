@extends('master')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tracker.css') }}">
        <h2>Upcoming Events</h2>
        <div class="event-container">
            @forelse ($upcomingEvents as $re)
                <div class="main-container">
                    <div class="card-container">
                        <img src="{{ $re->events->image_url }}" alt="" class="card-image">
                        <div class="content-container">
                            <h3>{{ $re->events->location }}</h3>
                            <div>{{ $re->events->date }}, {{ date('H:i', strtotime($re->events->time_start)) }} - {{ date('H:i', strtotime($re->events->time_end)) }}</div>
                            <div class="description-text">
                                {{ $re->events->description }}
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('event', $re->event_id) }}"><button type="submit" class="main-button primary-bg-color">View Details</button></a>
                </div>
            @empty
                <h4>
                    No Upcoming Events
                </h4>
            @endforelse
        </div>
        <h2>Previous Events</h2>
        <div class="event-container">
            @forelse ($previousEvents as $re)
                <div class="main-container">
                    <div class="card-container">
                        <img src="{{ $re->events->image_url }}" alt="" class="card-image">
                        <div class="content-container">
                            <h3>{{ $re->events->location }}</h3>
                            <div>{{ $re->events->date }}, {{ date('H:i', strtotime($re->events->time_start)) }} - {{ date('H:i', strtotime($re->events->time_end)) }}</div>
                            <div class="description-text">
                                {{ $re->events->description }}
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('event', $re->event_id) }}"><button type="submit" class="main-button primary-bg-color">View Details</button></a>
                </div>
            @empty
                <h4>
                    No Previous Events
                </h4>
            @endforelse
        </div>
@endsection
