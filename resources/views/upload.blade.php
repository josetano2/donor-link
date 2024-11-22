<form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="photo">Upload Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
