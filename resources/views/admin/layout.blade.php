<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e84f2d0407.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

    <title>Document</title>
</head>
<body>

<div class="row justify-content-between">
    <div class="vh-100 h-auto w-25 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Адмінка</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link active" aria-current="page">
                    Головна
                </a>
                <a href="{{ route('admin.user.index') }}" class="nav-link text-white" aria-current="page">
                    <i class="fa-solid fa-user"></i>    Користувачі
                </a>
            </li>
            @can('all-posts')
            <li>
                <a href="{{ route('admin.post.index') }}" class="nav-link text-white">
                    <i class="fa-solid fa-newspaper"></i>    Дописи
                </a>
            </li>
            @endcan
            <li>
                <a href="{{ route('admin.category.index') }}" class="nav-link text-white">
                    <i class="fa-solid fa-bars"></i>    Категорії
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-primary w-100" type="submit">Вийти</button>
            </form>
        </div>
    </div>

    <div class="w-75 pt-5">
    @yield('content')
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
</html>
