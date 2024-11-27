@extends('master')

@section('content')
<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="mb-4">Donor Blood Events</h2>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createEventModal">
        Add New Event
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event Image</th>
                <th>Description</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
                <th>Date</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Location</th>
                <th>Max Capacity</th>
                <th>Hospital ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td><img src="{{ $event->image_url }}" alt="Event Image" width="100"></td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->contact_person }}</td>
                    <td>{{ $event->contact_number }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->time_start }}</td>
                    <td>{{ $event->time_end }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->max_capacity }}</td>
                    <td>{{ $event->hospital_id }}</td>
                    <td class="p-3">
                        <div class="d-flex justify-content-center align-items-center gap-2 w-100">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}">
                                Edit
                            </button>
                            <form action="{{route('admin.delete_event', $event->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-danger btn-sm"
                                                      onclick="return confirm('Are you sure you want to delete this event?');">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>


                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1"
                    aria-labelledby="editEventModalLabel{{ $event->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{route('admin.edit_event', $event->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEventModalLabel{{ $event->id }}">Edit Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('admin.event-form', ['event' => $event])
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Update Event</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.create_event')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createEventModalLabel">Create New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @include('admin.event-form', ['event' => null])
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Event</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
