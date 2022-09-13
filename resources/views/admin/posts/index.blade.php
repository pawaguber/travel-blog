@extends('admin.layout')

@section('content')
    <a class="btn btn-success mb-5" href="{{ route('admin.post.create') }}">Створити допис</a>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Показати</th>
        <th>Редактувати</th>
        <th>Удалити</th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td><a class="btn btn-success" href="{{route('post.show', $post->id)}}">Показати</a></td>
            <td><a class="btn btn-primary" href="{{route('admin.post.edit', $post->id)}}">Редактувати</a></td>
            <td>
                <form action="{{route('admin.post.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="SUBMIT">Удалити</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
