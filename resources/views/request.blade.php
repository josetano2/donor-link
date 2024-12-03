@extends('master')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/request.css') }}">
    <h2>Your Blood Donor Request</h2>

    @if ($donorRequests->count() <= 0)
        <div>
            No Request Submitted
        </div>
    @else

        <table class="table">
            <thead class="header-red">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Hospital</th>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Requested At</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="column-span">Reason</th>
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
    <h2>Request Blood Donors</h2>
    <form action="{{route('request.create')}}" method="POST" class="form-container">
        @csrf
        <select class="form-select" name="hospital">
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
        <button type="submit" class="main-button primary-bg-color">Submit Request</button>
    </form>
@endsection

