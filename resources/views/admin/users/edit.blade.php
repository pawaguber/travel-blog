@extends('admin.layout')

@section('content')
    <div class="w-25">
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Імя</span>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            @error('email')
            <p>{{$message}}</p>
            @enderror

            <select class="form-select" name="role">
                @foreach($roles as $id => $role)
                    <option value="{{ $id }}" {{ $id == $user->role ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
            @error('role')
            <div><p>{{$message}}</p></div>
            @enderror
            <button class="mt-3 btn btn-success" type="submit">Обновити</button>
        </form>
    </div>
@endsection
