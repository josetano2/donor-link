@extends('master')

@section('content')
<div class="container my-5">
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
            <a href="#" class="btn btn-success mt-3">Register Now</a>
        </div>
    </div>
</div>
@endsection
