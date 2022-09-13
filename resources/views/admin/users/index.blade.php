@extends('admin.layout')

@section('content')
    <a class="btn btn-success mb-5" href="{{ route('admin.user.create') }}">Створити користувача</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Редактувати</th>
            <th>Удалити</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->email}}</td>
                @if(Auth::user()->id !== $user->id)
                    <td><a class="btn btn-primary" href="{{route('admin.user.edit', $user->id)}}">Редактувати</a></td>
                @endif
                <td>
                    @if(Auth::user()->id !== $user->id)
                    <form action="{{route('admin.user.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="SUBMIT">Удалити</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
