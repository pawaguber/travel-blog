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

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="SUBMIT">Вихід</button>
</form>
    <p>Привіт: <strong>{{ $profile->name }}</strong></p>
    <p>Почта: <strong>{{ $profile->email }}</strong></p>
    <p>Аккаунт створений: <strong>{{ $profile->created_at }}</strong></p>

    <div>
        <h4>Лайкнувші дописи:</h4>
        @foreach($likesPosts as $post)
            <p>{{ $post->title }}</p>
        @endforeach
    </div>
</body>
</html>
