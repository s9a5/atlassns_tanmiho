@extends('layouts.login')

@section('content')
<p>検索</p>

<form method="GET" action="{{ route('users.search') }}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
    </div>
</form>

<!-- 検索ワードを表示 -->
@foreach($users as $user)
    <!-- 自分以外のユーザーを表示 -->
    @if(isset($user)and!(Auth::user()==$user))
    <tr>
      <td><img src="{{$user->images}}" alt="ユーザーアイコン"></td>
      <td>{{$user->username}}</td>
    </tr>
    @elseif(isset($user)and!(Auth::user()==$user)and(isset($keyword)))
    <tr>
      <td><img src="{{ $data->appends(Request::only('keyword'))->images}}" alt="ユーザーアイコン"></td>
      <td> {{ $data->appends(Request::only('keyword'))}}</td>
    </tr>
    @endif

  <from action="{{ route('follows.follow') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $data->id }}">
    <button type="submit" class="btn-primary">
    @if (auth()->user()->isFollowing($user->id))
    <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn unfollow_btn">フォロー解除</a>
    @else
    <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn follow_btn">フォローする</a>
    @endif
     </button>
  </form>

@endforeach
@endsection