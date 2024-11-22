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
        <div class="form-floating">
            <input type="text" class="form-control" id="location" name="location" placeholder="Location">
            <label for="location">Location</label>
        </div>
        <select class="form-select">
            @foreach ($hospitals as $h)
                <option value={{ $h->id }}>{{ $h->name }}</option>
            @endforeach
        </select>

        <div class="form-floating">
            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
            <label for="description">Description</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="max-capacity" name="max-capacity" placeholder="Max Capacity">
            <label for="max-capacity">Max Capacity</label>
        </div>
        <div class="time-container">
            <div class="form-floating">
                <input type="time" class="form-control" id="time-start" name="time-start" placeholder="Time Start">
                <label for="time-start">Time Start</label>
            </div>
            <div class="form-floating">
                <input type="time" class="form-control" id="time-end" name="time-end" placeholder="Time End">
                <label for="time-end">Time End</label>
            </div>

        </div>
       <div class="form-floating">
            <input type="text" class="form-control" id="contact-number" name="contact-number" placeholder="Contact Number">
            <label for="contact-number">Contact Number</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="contact-person" name="contact-person" placeholder="Contact Person">
            <label for="contact-person">Contact Person</label>
        </div>
        <div class="form-floating">
            <input type="date" class="form-control" id="date" name="date" placeholder="mm/dd/yyyy">
            <label for="date">Date Event</label>
        </div>
        <button type="button" class="main-button primary-bg-color">Create Event</button>
        <button type="button" class="main-button secondary-bg-color">Logout</button>

    </div>

</body>
</html>
