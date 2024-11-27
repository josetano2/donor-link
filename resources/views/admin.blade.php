<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</head>

<body>
    <div class="parent-container">
        <h1>Create Event</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" enctype="multipart/form-data" class="form-container"
            action="{{ route('admin.create_event') }}">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                <label for="location">Location</label>
            </div>
            <select class="form-select" name="hospital_id">
                @foreach ($hospitals as $h)
                    <option value={{ $h->id }}>{{ $h->name }}</option>
                @endforeach
            </select>
            <div class="form-floating">
                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                <label for="description">Description</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="max_capacity" name="max_capacity"
                    placeholder="Max Capacity">
                <label for="max_capacity">Max Capacity</label>
            </div>
            <div class="time-container">
                <div class="form-floating">
                    <input type="time" class="form-control" id="time_start" name="time_start" placeholder="Time Start">
                    <label for="time_start">Time Start</label>
                </div>
                <div class="form-floating">
                    <input type="time" class="form-control" id="time_end" name="time_end" placeholder="Time End">
                    <label for="time_end">Time End</label>
                </div>

            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="contact_number" name="contact_number"
                    placeholder="Contact Number">
                <label for="contact_number">Contact Number</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="contact_person" name="contact_person"
                    placeholder="Contact Person">
                <label for="contact_person">Contact Person</label>
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" id="date" name="date" placeholder="mm/dd/yyyy">
                <label for="date">Date Event</label>
            </div>
            <div class="form-group">
                <label for="photo">Upload Photo</label>
                <input type="file" class="form-control" name="photo" id="photo">
            </div>
            <button type="submit" class="main-button primary-bg-color">Create Event</button>
        </form>
        <button type="button" class="main-button secondary-bg-color">Logout</button>

    </div>

</body>

</html>
