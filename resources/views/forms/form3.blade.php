<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Full Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <h1>Full Form</h1>
        {{-- Global Errors --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form action="{{ route('form3_data') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                @error('dob')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Gender</label> <br>
                <input @checked(old('gender') == 'Male') type="radio" name="gender" id="male" value="Male"> <label for="male">Male</label> <br>
                <label><input {{ (old('gender') == 'Female') ? 'checked' : '' }} type="radio" name="gender" value="Female"> Female</label> <br>
                @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="education_level">Education Level</label>
                <select class="form-select @error('education_level') is-invalid @enderror" id="education_level" name="education_level">
                    <option value=""> -- Select Level -- </option>
                    <option @selected(old('education_level') == 'School') value="School">School</option>
                    <option @selected(old('education_level') == 'Diploma') value="Diploma">Diploma</option>
                    <option @selected(old('education_level') == 'Bachelor') value="Bachelor">Bachelor</option>
                    <option @selected(old('education_level') == 'Master') value="Master">Master</option>
                    <option @selected(old('education_level') == 'PhD') value="PhD">PhD</option>
                </select>
                @error('education_level')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Hobbies</label> <br>
                <label><input type="checkbox" name="hobbies[]" value="Football"
    @checked(in_array('Football', old('hobbies', [])))
                    > Football</label> <br>
                <label><input type="checkbox" name="hobbies[]" value="Basketball"
    @checked(in_array('Basketball', old('hobbies', [])))
                    > Basketball</label> <br>
                <label><input type="checkbox" name="hobbies[]" value="Swimming"
    @checked(in_array('Swimming', old('hobbies', [])))
                    > Swimming</label> <br>
                @error('hobbies')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bio">bio</label>
                <textarea name="bio" id="bio" placeholder="Bio" class="form-control @error('bio') is-invalid @enderror" rows="4"></textarea>
                @error('bio')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5">Send</button>
        </form>
    </div>

</body>
</html>
