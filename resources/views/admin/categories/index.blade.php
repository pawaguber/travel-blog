@extends('admin.layout')

@section('content')
    <a class="btn btn-success mb-5" href="{{ route('admin.category.create') }}">Створити категорію</a>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Редактувати</th>
        <th>Удалити</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td><a class="btn btn-primary"href="{{route('admin.category.edit', $category->id)}}">Редактувати</a></td>
            <td>
                <form action="{{route('admin.category.destroy', $category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"type="SUBMIT">Удалити</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection


