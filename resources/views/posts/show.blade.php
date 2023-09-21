<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post {{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body>

    <div class="container my-5 text-center">
        <h2>{{ $post->title }}</h2>
        <img class="w-75" src="{{ $post->image }}" alt="">
        <div class="desc">
            {{ $post->body }}
        </div>
    </div>

</body>
</html>
