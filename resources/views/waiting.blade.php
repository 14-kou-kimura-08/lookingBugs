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
        <p>{{ $adminUser->name }}さん</p>
        <p>以下のURLを参加メンバーに教えてあげてください。</p>
        <a href="{{ url('/assign/'.$newMeeting->id) }}">{{ url('/assign/'.$newMeeting->id) }}</a>
        <p>参加メンバーが揃ったら、Meetingをスタートしてください</p>
        <a href="{{ url('/meeting/'.$newMeeting->id) }}">Meeting スタート</a>
    </body>
</html>
