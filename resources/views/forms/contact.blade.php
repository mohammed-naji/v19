<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body>
    <div class="container my-5">
        <h1>Basic Form</h1>
        <form action="{{ route('contact_data') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" placeholder="Enter your name.." class="form-control @error('name') is-invalid @enderror" name="name" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" placeholder="Enter your email.." class="form-control @error('email') is-invalid @enderror" name="email" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" placeholder="Enter your phone.." class="form-control @error('phone') is-invalid @enderror" name="phone" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Subject</label>
                        <input type="text" placeholder="Enter your subject.." class="form-control @error('subject') is-invalid @enderror" name="subject" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea placeholder="Enter your subject.." class="form-control @error('message') is-invalid @enderror" name="message" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <button class="btn btn-success px-5"><i class="fas fa-envelope"></i> Send</button>

        </form>
    </div>

</body>
</html>
