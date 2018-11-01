<form action="{{ route('meeting.store') }}" method="post">
@foreach($users as $user)
    <input type="radio" name="user" value="{{ $user->id }}">{{ $user->name }}
@endforeach
@if($loginUser->admin === 1)
    <button type="submit">全員が登録したら結果を見る</button>
@else
    <button type="submit">投票する</button>
@endif
</form>
