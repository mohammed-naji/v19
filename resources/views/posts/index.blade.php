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
    <style>
        .search-form {
            position: relative;
            margin: 20px 0
        }

        .search-form button {
            border: 0;
            background: transparent;
            position: absolute;
            right: 10px;
            top: 5px;
        }

        .result {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            position: absolute;
            background: #fbfbfb;
            width: 100%;
            display: none;
        }

        .result ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .result ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
            transition: all .3s ease;
        }

        .result ul li a img {
            margin-right: 10px;
        }

        .result ul li a span {
            color: #f00;
        }

        .result ul li a:hover {
            background: #eee;
        }
    </style>
</head>
<body>
    <div class="container my-5">

        {{-- @dump(session('msg')) --}}
        {{-- @if (session()->has('msg')) --}}

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h2>All Posts</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-success px-4"><i class="fas fa-plus"></i> Add new Post</a>
        </div>

        <form class="search-form" action="{{ route('posts.index') }}" method="GET">
            <div class="search">
                <input type="text" name="q" value="{{ request()->q }}" class="form-control" placeholder="Search here..">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="result">
                <ul>

                </ul>
            </div>
        </form>
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
                <td><img width="80" src="{{ asset('images/'.$post->image) }}" alt=""></td>
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

        {{ $posts->appends('q', request()->q)->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

        @if (session('msg'))
        Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
        })
        @endif

        setTimeout(() => {
            document.querySelector('.alert').classList.remove('show')
            setTimeout(() => {
                document.querySelector('.alert').remove();
            }, 300)
        }, 2000);

        // AJAX
        // VanillaJS
        // FetchAPI
        // jQuery
        // Axios

        document.querySelector('.search-form').onsubmit = (e) => {
            e.preventDefault();
        }

        let inp = document.querySelector('.search-form input');
        inp.onkeyup = (e) => {

            if(inp.value.length >= 2) {
                axios.get('{{ route("search_post") }}', {
                    params: {
                        q: inp.value
                    }
                })
                .then((res) => {
                    document.querySelector('.result ul').innerHTML = '';
                    if(res.data.length > 0) {
                        document.querySelector('.result').style.display = 'block';
                        res.data.forEach(el => {
                            let item = `<li>
                                <a href="">
                                    <img width="60" src="${el.image}" alt="">
                                    ${el.title}
                                </a>
                            </li>`
                            document.querySelector('.result ul').innerHTML += item
                        });

                    }else {
                        document.querySelector('.result').style.display = 'none';
                    }
                }).catch((err) => {
                    console.log('Error');
                });
            }else {
                document.querySelector('.result').style.display = 'none';
            }

        }

    </script>

</body>
</html>
