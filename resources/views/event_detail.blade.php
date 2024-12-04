@extends('master')

@section('content')
<form class="container my-5" action="{{ $isRegistered ? route('event.unregister') : route('event.register') }}"
    method="POST">
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
            <h4><strong>@lang('event.location'):</strong> {{ $event->location }}</h4>
            <p class="text-muted">
                <i class="far fa-calendar-alt"></i> {{ $event->date }} &nbsp;
                <i class="far fa-clock"></i> {{ $event->time_start }} - {{ $event->time_end }}
            </p>
            <p>{{ $event->description }}</p>
            <p><strong>@lang('event.total_participants'):</strong> {{ $totalParticipants }} / {{ $event->max_capacity }}
            </p>
            <h4><strong>@lang('event.contact_info')</strong></h4>
            <p><strong>@lang('event.contact_person'):</strong> {{ $event->contact_person }}</p>
            <p><strong>@lang('event.contact_number'):</strong> {{ $event->contact_number }}</p>

            @if($event->date >= date('Y-m-d'))
                @if($isRegistered)
                    <button class="main-button secondary-bg-color" type="submit">@lang('event.unregister')</button>
                @else
                    <button class="main-button primary-bg-color" type="submit">@lang('event.register')</button>
                @endif
            @endif
        </div>
    </div>
</form>
@endsection