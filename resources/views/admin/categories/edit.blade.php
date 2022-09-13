@extends('admin.layout')

@section('content')
    <div class="w-25">
        <form action="{{ route('admin.category.update', $category->id)  }}" method="POST">
            @csrf
            @method('patch')
                <label for=""></label>
            <label for="exampleInputEmail1" class="form-label">Змінити назву категорії</label>
            <input type="text" class="form-control" name="title" value="{{$category->title}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
                <p>Текст потрібно заповнити!</p>
            @enderror
            <button class="mt-4 btn btn-success" type="submit" value="Створити">Обновити</button>
        </form>
    </div>
@endsection
