@extends('layout.main')

@section('page-name', $post->title)

@section('content')

    </header>
<section class="container-fluid py-5 justify-content-center">
    <div class="text-center mb-1">
        <p class="h6 mb-0 text-uppercase text-primary">{{ $post->category->title }}</p>
        <ul class="list-inline small text-uppercase mb-0">
            <li class="list-inline-item text-muted align-middle me-0"><i
                    class="fa-regular fa-calendar"></i> {{ $date->day }} {{ $date->translatedFormat('F') }}
                , {{ $date->format("H:i") }}</li>
            <li class="list-inline-item text-muted align-middle me-0">|</li>
            <li class="list-inline-item text-muted align-middle">{{$post->views}} <i class="fa-regular fa-eye"></i></li>
        </ul>
    </div>


    <div class="container">
        <div class="row">
            <img src="{{ Storage::url('images/'.$post->main_image) }} "">
            <p class="fs-3 fw-bold">{{$post->title}}</p>
            <div class="col-lg-8">
                <p class="lead first-letter-styled lh-4">{!! $post->content !!}</p>
            </div>
            <div class="col-lg-4">
                <!-- Latest posts widget -->
                <div class="mb-5">
                    <h3 class="fw-bold fs-4 mb-2"><i class="fa-solid fa-file-lines"></i> Схожі дописи:</h3>
                    <ul class="list-unstyled">
                        @foreach($relatedPosts as $post)
                            <li class="d-flex mb-2"><a href="{{ route('post.show', $post->id) }}"><img
                                        src="{{Storage::url('images/'. $post->preview_image)}} " alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <h6 class="mb-1"><a class="reset-anchor"
                                                        href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                    </h6>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @guest()
            <h3 class="pt-5">Для того, щоб залишити коментар, потрібно зарєструватися!</h3>
        @endguest

        @auth()
            <div class="pt-5">
                @if((!$post->like(auth()->user()->id)->exists()))
                    <form>
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button class="like border-0 bg-transparent fw-bold" type="SUBMIT">Підтримати лайком <i
                                class="fa-solid fa-heart text-danger ps-3"></i></button>
                    </form>
                @else
                    <form>
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button class="like border-0 bg-transparent fw-bold" type="SUBMIT">Забрати лайк<i
                                class="fa-solid fa-heart text-success ps-3"></i></button>
                    </form>
                @endif
            </div>
        @endauth()
    </div>
</section>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <span class="text-success fs-3 fw-bold" id="result"></span>
            <h1 class="fs-1">Коментарії</h1>
            <p class="result"></p>
            @auth()
                <form>
                    <div class="form-floating">
                    <textarea class="form-control" name="content" id="floatingTextarea2"
                              style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <button class="btn btn-success float-end mt-3 btn-submit" type="SUBMIT">Ваш коментар</button>
                </form>
            @endauth()

            @foreach($post->comment as $comments)
                <div class="media g-mb-30 media-comment">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <div class="g-mb-15">
                            <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$comments->user->name}}</h5>
                            <span
                                class="g-color-gray-dark-v4 g-font-size-12">{{ \Carbon\Carbon::parse($comments->created_at)->translatedFormat('d F')}}</span>
                        </div>

                        <p>{{ $comments->content }}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function (e) {
        e.preventDefault();
        var content = $("textarea[name=content]").val();
        var user_id = $("input[name=user_id]").val();
        var post_id = $("input[name=post_id]").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('post.comment.store') }}",
            data: {content: content, post_id: post_id},
            success: function (data) {
                $('#result').text(data.success);
            }
        });
    });

    $(".like").click(function (e) {
        e.preventDefault();
        var post_id = $("input[name=post_id]").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('post.like.store') }}",
            data: {post_id: post_id},
            success: function (data) {
                $('#result').text(data.success);
            }
        });
    });
</script>


@endsection
