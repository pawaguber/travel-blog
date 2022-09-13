@extends('admin.layout')
@section('content')

    <div class="w-50">
        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="form-control" id="floatingInputValue" value="{{ old('title') }}">
            <label for="floatingInputValue">Назва дописа</label>
                @error('title')
                    <p class="alert-danger">{{$message}}</p>
                @enderror

            <div class="pt-3"></div>
            <label for="floatingInputValue">Опис дописа</label>
            <textarea name="content" id="summernote">{{ old('content') }}</textarea><script>
                $('#summernote').summernote({
                });
            </script>
                @error('content')
                    <p class="alert-danger">{{$message}}</p>
                @enderror

            <label for="formFile" class="form-label">Загрузіть прев'ю</label>
            <input class="form-control" type="file" name="preview_image" id="formFile">
                @error('preview_image')
                    <p class="alert-danger">{{$message}}</p>
                @enderror

            <label for="formFile" class="form-label mt-3">Загрузіть фотографію</label>
            <input class="form-control" type="file" name="main_image" id="formFile">
                @error('main_image')
                    <p class="alert-danger">{{$message}}</p>
                @enderror

            <label class="mt-3" for="floatingInputValue">Виберіть категорію</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select><br>
                @error('category_id')
                    <p class="alert-danger">{{$message}}</p>
                @enderror

            <button class="btn btn-success mt-3" type="submit">Створити</button>
        </form>
    </div>

@endsection
