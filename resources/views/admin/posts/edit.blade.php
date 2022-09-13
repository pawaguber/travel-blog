@extends('admin.layout')
@section('content')

    <div class="w-50">
        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="floatingInputValue">Назва дописа</label>
            <input type="text" name="title" class="form-control" id="floatingInputValue" value="{{ $post->title }}"><br>

            @error('title')
            <p class="alert-danger">{{$message}}</p>
            @enderror

            <div class="pt-3"></div>

            <label for="floatingInputValue">Опис дописа</label>
            <textarea name="content" id="summernote">{{ $post->content }}</textarea><script>
                $('#summernote').summernote({
                });
            </script>
            @error('content')
            <p class="alert-danger">{{$message}}</p>
            @enderror

            <div class="pt-3"></div>

            <img class="w-100" src="{{url('storage/'. $post->preview_image) }}" alt=""><br>
            <input class="form-control" type="file" name="preview_image" id="formFile">
            <label for="formFile" class="form-label">Оновити прев'ю</label>
            @error('preview_image')
            <p class="alert-danger">{{$message}}</p>
            @enderror

            <div class="pt-3"></div>

            <img class="w-100" src="{{url('storage/'. $post->main_image) }}" width="300px" alt=""><br>
            <input class="form-control" type="file" name="main_image" id="formFile">
            <label for="formFile" class="form-label">Оновити головну картинку</label>

            <div class="pt-3"></div>

            <label class="mt-3" for="floatingInputValue">Виберіть категорію</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" selected="{{ $category->title }}">{{ $category->title }}</option>
                @endforeach
            </select>

            <button class="btn btn-success mt-3" type="submit">Створити</button>
        </form>
    </div>
@endsection
