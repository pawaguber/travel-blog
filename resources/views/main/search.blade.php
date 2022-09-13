@extends('layout.main')

@section('page-name', '12')

@section('content')

    <div class="album py-5">
        <div class="container">
            <p style="font-size: 30px; line-height: 1px" class="fw-bold">Дописи:</p>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                @foreach($posts as $post)
                    <div class="col pt-5">
                        <div class="card shadow-sm">
                            <img class="card-img-top" style="height: 500px" src="{{ 'storage/' . $post->preview_image }}" alt="">
                            <div class="card-body">
                                <p class="card-text fw-bold">{{ $post->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p><i class="fa-solid fa-calendar"></i>   Опубліковано: <strong>{{ \Carbon\Carbon::parse($post->create_at)->translatedFormat('d F Y')}}</strong></p>
                                    </div>
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-dark w-25">Детальніше</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
