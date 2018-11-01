<head>
    @if( !$user->position_id )
    <meta http-equiv="refresh" content="3;URL=/meeting/confirm">
    @endif
</head>
<body>

</body>
{{ $user->name }}さん<br>
@if( $user->position_id === 1 )
    position_idは{{ $user->position_id }}です
    あなたはエンジニアです
@endif

@if( $user->position_id === 2 )
    position_idは{{ $user->position_id }}です
    あなたはバグです
@endif

@if( $user->position_id === 3 )
    position_idは{{ $user->position_id }}です
    あなたはリサーチャーです
@endif

@if( !$user->position_id )
少々お待ちください
@endif

@if( $user->admin === 1 )
    <a href="/meeting/start">Meetingを開始する</a>
@endif
