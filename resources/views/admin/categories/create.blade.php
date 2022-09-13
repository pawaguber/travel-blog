@extends('admin.layout')

@section('content')
    <div class="w-25">
        <form action="{{ route('admin.category.store')  }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Назва категорії</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            @error('title')
            <p class="alert-danger">Текст потрібно заповнити!</p>
            @enderror
            <button class="btn btn-success"type="submit">Створити</button>
        </form>
    </div>
@endsection
