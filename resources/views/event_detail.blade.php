@extends('master')

@section('content')
<form class="container my-5" action="{{route('event.register')}}" method="POST">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @csrf
    <input type="hidden" name="event_id" value="{{ $event->id }}">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $event->image_url }}" class="img-fluid rounded" alt="{{ $event->events }}">
        </div>

        <div class="col-md-6">
            <h1>{{ $event->events }}</h1>
            <p class="text-muted">
                <i class="far fa-calendar-alt"></i> {{ $event->date }} &nbsp;
                <i class="far fa-clock"></i> {{ $event->time_start }} - {{ $event->time_end }}
            </p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p>{{ $event->description }}</p>
            <p><strong>Maximum Capacity:</strong> {{ $event->max_capacity }}</p>
            <h4>Contact Information</h4>
            <p><strong>Contact Person:</strong> {{ $event->contact_person }}</p>
            <p><strong>Contact Number:</strong> {{ $event->contact_number }}</p>
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </div>
    </>
    @endsection