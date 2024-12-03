@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('css/request.css') }}">
<h2>@lang('request.your_request')</h2>

@if ($donorRequests->count() <= 0)
    <div>
        @lang('request.no_request_submitted')
    </div>
@else

    <table class="table">
        <thead class="header-red">
            <tr>
                <th scope="col">@lang('request.no')</th>
                <th scope="col">@lang('request.hospital')</th>
                <th scope="col">@lang('request.blood_type')</th>
                <th scope="col">@lang('request.requested_at')</th>
                <th scope="col">@lang('request.status')</th>
                <th scope="col" class="column-span">@lang('request.reason')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donorRequests as $dr)
                <tr class="{{ $statusEnum[$dr->status] }}">
                    <td>{{ $dr->id }}</td>
                    <td>{{ $dr->hospital->name }}</td>
                    <td>{{ $dr->bloodType->type }}</td>
                    <td>{{ $dr->request_date }}</td>
                    <td>{{ $dr->status }}</td>
                    <td class="column-span">{{ $dr->reason }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $donorRequests->links('pagination::bootstrap-5') }}

@endif

<hr />
<h2>@lang('request.request_blood_donors')</h2>
<form action="{{ route('request.create') }}" method="POST" class="form-container">
    @csrf
    <select class="form-select" name="hospital">
        <option value="" disabled selected>@lang('request.select_hospital')</option>
        @foreach ($hospitals as $h)
            <option value={{ $h->id }}>{{ $h->name }}</option>
        @endforeach
    </select>

    <select class="form-select" name="blood_type">
        <option value="" disabled selected>@lang('request.select_blood_type')</option>
        @foreach ($bloodTypes as $bt)
            <option value={{ $bt->id }}>{{ $bt->type }}</option>
        @endforeach
    </select>
    <div class="form-floating">
        <textarea type="text" class="form-control" id="reason" name="reason"
            placeholder="@lang('request.reason')"></textarea>
        <label for="reason">@lang('request.reason')</label>
    </div>
    <button type="submit" class="main-button primary-bg-color">@lang('request.submit_request')</button>
</form>
@endsection