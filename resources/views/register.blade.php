
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

</head>
<body>
    <div class="parent-container">
        <div class="content-container">
            <div class="title-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
            </div>
            <form action="{{route('register.store')}}" method="POST" class="form-container">
                @csrf

                <div class="login-text">Register</div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="email">Password</label>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="mm/dd/yyyy">
                    <label for="dob">Date of Birth</label>
                </div>
                <select class="form-select" name="blood_type">
                    @foreach ($blood_types as $bt)
                        <option value={{ $bt->id }}>{{ $bt->type }}</option>
                    @endforeach
                </select>
                <select class="form-select" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                </select>
                <button type="submit" class="main-button primary-bg-color">Sign Up</button>
                <button type="button" class="main-button secondary-bg-color">Have an account?</button>
            </form>
        </div>
        <img class="bg" src="https://www.homage.com.my/wp-content/uploads/sites/2/2022/06/Blood-Donor-Privileges-Malaysia.png" alt="">
        <div class="black-bg">

        </div>
    </div>



</body>
</html>
