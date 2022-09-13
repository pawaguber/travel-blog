@extends('admin.layout')
@section('content')

                <p><i class="fa-solid fa-user"></i>  Всього користувачів: {{$data['usersCount']}}</p>
                <p><i class="fa-solid fa-newspaper"></i>  Всього дописи: {{$data['postsCount']}}</p>
                <p><i class="fa-solid fa-bars"></i>  Всього категоріїв: {{$data['categoriesCount']}}</p>

@endsection
