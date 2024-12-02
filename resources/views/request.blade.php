@extends('master')

@section('content')

    <h2>Your Blood Donor Request</h2>

    @if ($donorRequests->count() <= 0)
        <div>
            No Request Submitted
        </div>
    @else
        <div>
            Request here
        </div>

    @endif
    <hr />
    <h2>Request Blood Donors</h2>
    <select class="form-select" name="hospital_id">
        @foreach ($hospitals as $h)
            <option value={{ $h->id }}>{{ $h->name }}</option>
        @endforeach
    </select>

    <select class="form-select" name="blood_type">
        @foreach ($bloodTypes as $bt)
            <option value={{ $bt->id }}>{{ $bt->type }}</option>
        @endforeach
    </select>
        <div class="form-floating">
        <textarea type="text" class="form-control" id="reason" name="reason" placeholder="Reason"></textarea>
        <label for="reason">Reason</label>
    </div>

    <a href="{{ route('events') }}">
        <button type="button" class="main-button primary-bg-color">Submit Request</button>
    </a>






@endsection

