<div class="row">
    <div class="col-md-6 mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control"
            required>{{ $event->description ?? old('description') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label for="image_url" class="form-label">Event Image</label>
        <input type="file" name="image_url" class="form-control" {{ isset($event) ? '' : 'required' }}>
        @if(isset($event) && $event->image_url)
            <img src="{{ $event->image_url }}" alt="Event Image" width="100" class="mt-2">
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input type="text" name="contact_person" class="form-control"
            value="{{ $event->contact_person ?? old('contact_person') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" class="form-control"
            value="{{ $event->contact_number ?? old('contact_number') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $event->date ?? old('date') }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="time_start" class="form-label">Time Start</label>
        <input type="time" name="time_start" class="form-control" value="{{ $event->time_start ?? old('time_start') }}"
            required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="time_end" class="form-label">Time End</label>
        <input type="time" name="time_end" class="form-control" value="{{ $event->time_end ?? old('time_end') }}"
            required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" name="location" class="form-control" value="{{ $event->location ?? old('location') }}"
            required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="max_capacity" class="form-label">Max Capacity</label>
        <input type="number" name="max_capacity" class="form-control"
            value="{{ $event->max_capacity ?? old('max_capacity') }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="hospital_id" class="form-label">Hospital ID</label>
        <select class="form-select col-md-3 mb-3" name="hospital_id"
            value="{{ $event->hospital_id ?? old('hospital_id') }}">
            @foreach ($hospitals as $h)
                <option value={{ $h->id }}>{{ $h->name }}</option>
            @endforeach
        </select>
    </div>
</div>