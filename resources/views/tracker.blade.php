@extends('master')

@section('content')

    @forelse ($registeredEvents as $re)
        <div>
            {{ $re->events->location }}
        </div>

    @empty
        <div>
            No Events Registered
        </div>

    @endforelse

@endsection
