<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body>

    <div class="container my-5">
        <h2>All Posts</h2>
        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td><img width="80" src="{{ $post->image }}" alt=""></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('M d, Y') }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach

        </table>

        {{ $posts->links() }}
    </div>

</body>
</html>
