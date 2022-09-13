<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('admin.user.store') }}" method="POST">
    @csrf
    <input type="name" name="name" value="{{old('name')}}">
    <input type="email" name="email" value="{{old('email')}}">
        @error('email')
        <p>{{$message}}</p>
        @enderror
    <select name="role">
        @foreach($roles as $id => $role)
            <option value="{{ $id }}">{{ $role }}</option>
        @endforeach
    </select>
    @error('role')
    <div><p>{{$message}}</p></div>
    @enderror
    <button type="submit">Створити</button>
</form>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="SUBMIT">Вихід</button>
</form>
</body>
</html>
а
