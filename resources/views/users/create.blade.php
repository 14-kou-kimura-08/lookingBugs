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
        <form action="{{ route('user.store', ['id' => $id]) }}" method="post">
            {{ csrf_field() }}
            <label for="name">ご自分のお名前を入力してください</label>
            <input id="name" type="text" name="name" required>
            <button type="submit">Meetingに参加する</button>
        </form>
    </body>
</html>
