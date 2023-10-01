<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

</head>
<body>
    <div class="container my-5">

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Trashed Posts</h2>
            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-dark px-4"><i class="fas fa-arrow-left"></i> All Posts</a>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>#</th>
                <th>Title</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->deleted_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i></a>
                    <a onclick="return confirm('Are you sure (you cant rollback!)')" href="{{ route('posts.forcedelete', $post->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
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

        function deleteItem(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.closest('form').submit();
                }
            })
        }

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
            title: '{{ session("msg") }}'
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
