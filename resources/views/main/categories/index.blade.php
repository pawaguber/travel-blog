@extends('layout.main')

@section('page-name', 'Головна сторінка')

@section('content')


    <div class="row justify-content-between">
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" class="card-link col-2 text-decoration-none">
                <div class="card my-2 me-4 bg-light shadow-lg border-0" style="width: 18rem; height: 12rem">
                    <div class="card-body">
                        <img class="w-100"  style="height: 8rem" src="{{ Storage::url('images/'.$category->image) }}">
                        <h5 class="card-title pt-3 fw-bold">{{ $category->title }}</h5>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
