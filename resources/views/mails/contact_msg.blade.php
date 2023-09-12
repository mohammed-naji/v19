<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h3 style="color: #ff8752">Dear Admin,</h3>
    <p>There is an new message received with this information</p>

    <p><b>Name</b>: {{ $data['name'] }}</p>

    <p><b>Email</b>: {{ $data['email'] }}</p>

    <p><b>Phone</b>: {{ $data['phone'] }}</p>

    <p><b>Subject</b>: {{ $data['subject'] }}</p>

    <p><b>Message</b>: {{ $data['message'] }}</p>
    <br>
    Best Regards
</body>
</html>
