<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Basic Form</h1>
        <form action="{{ route('form1') }}" method="POST">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Enter your name.." class="form-control" name="name" />
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" placeholder="Enter your email.." class="form-control" name="email" />
            </div>

            <div class="mb-3">
                <label>age</label>
                <input type="text" placeholder="Enter your age.." class="form-control" name="age" />
            </div>

            <div class="mb-3">
                <label>Gender</label> <br>
                <input type="radio" name="gender" /> Male <br>
                <input type="radio" name="gender" /> Female
            </div>

            <button class="btn btn-success">Send</button>
        </form>
    </div>

</body>
</html>
