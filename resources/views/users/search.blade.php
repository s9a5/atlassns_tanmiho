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
@if (!empty($searchWord))
<p>検索ワード:{{$searchWord}}</p>
@endif

@foreach($users as $user)
<!-- 自分以外のユーザーを表示 -->
@if (!($user->username == $user->username))
<tr>
    <td>(($user->username))</td>
    <td><img src="{{ $user->images }}" alt="ユーザーアイコン"></td>
</tr>
@endif
@endforeach

@endsection