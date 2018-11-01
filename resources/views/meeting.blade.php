<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>バグを探せ！</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <p>{{ $user->name }}さん、URLをシェアしてメンバーを集めてください</p>
        {{ url('/meeting/'.$meeting->id) }}
        <a href="/meeting/confirm">
            <button>全員が登録したら押してください</button>
        </a>
    </body>
</html>
