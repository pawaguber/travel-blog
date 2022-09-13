@extends('layout.main')

@section('page-name', 'Головна сторінка')

@section('content')

    <div style="height: 600px" class="container-fluid col-md-12 d-flex justify-content-center backgroud-images">
        <div class="row align-items-center justify-content-center">

            <div>
                <h1 class="fw-bold text-primary bg-white">Подорожуй. Досліджуй. Насолоджуйся.</h1>

                <form class="row" action="{{ route('main.search') }}" method="GET">
                    <div class="col-md-10 w-50">
                        <input type="text" name="s" class="form-control shadow" aria-label="Sizing example input"
                               autocomplete="off" aria-describedby="inputGroup-sizing-lg" placeholder="Введіть назву міста">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary shadow">Шукати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid col-md-12 row justify-content-center">
        @foreach($popularCategory as $category)
            <a href="{{ route('category.show', $category->slug) }}" class="card-link text-decoration-none col-xxl-2 col-lg-4 col-md-5">
                <div class="card my-2 me-4 bg-light shadow-lg border-0" style="width: 18rem; height: 12rem">
                    <div class="card-body">
                        <img class="w-100" style="height: 8rem" src="{{ Storage::url('images/'.$category->image) }}">
                        <h5 cass="card-title pt-3 fw-bold">{{ $category->title }}</h5>

                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="row col-md-12 justify-content-between pb-5 pt-5">
        <div class="mt-4 col-md-6 ms-md-5 justify-content-center row">
            @foreach($popularPosts as $post)
                <div class="card my-2 me-4 bg-light shadow-lg border-0" style="width: 18rem; height: 18rem">
                    <div class="card-body">
                        <img style="height: 140px" src="{{ Storage::url('images/'. $post->preview_image) }}">
                        <h5 class="card-title pt-3 fw-bold">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->title }} | {{$post->views}} <i
                                class="fa-solid fa-eye"></i></h6>
                        <a href="{{ route('post.show', ['post' => $post->id]) }}"
                           class="card-link">Переглянути пост</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container-fluid col-md-3 pt-5 justify-content-center">
            <p class="fw-bold">Рекомендації від редакції:</p>
            <div style="padding-bottom: 50px" class="list-group">
                @foreach($randomPosts as $post)
                    <a href="{{ route('post.show', $post->id) }}"
                       class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <h6 class="mb-0">{{ $post->title }} | {{$post->category->title}}</h6>
                            </div>
                            <p class="fw-lighter opacity-50 text-nowrap">
                                <strong>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</strong>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


    <div class="album py-5">
        <div class="container">
            <p style="font-size: 30px; line-height: 1px" class="fw-bold">Дописи:</p>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                @foreach($posts as $post)
                    <div class="col pt-5">
                        <div class="card shadow-sm">
                            <img class="card-img-top" height="100%"
                                 src="{{ Storage::url('images/'. $post->preview_image) }}" alt="">
                            <div class="card-body">
                                <p class="card-text fw-bold">{{ $post->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p><i class="fa-solid fa-calendar"></i> Опубліковано:
                                            <strong>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</strong>
                                        </p>
                                    </div>
                                    <a href="{{ route('post.show', ['post' => $post->id]) }}"
                                       class="btn btn-dark w-25">Детальніше</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
