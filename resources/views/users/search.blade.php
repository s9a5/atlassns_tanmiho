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
@if (!empty($keyword))
<p>検索ワード:{{$keyword}}</p>
@endif

<!-- 保存されているユーザー一覧 -->
<div class="container-list">

<table class="table tablehover">
@foreach($users as $user)
<!-- 自分以外のユーザーを表示 -->
@if (!($user->username == $users->username))
<tr>
    <td>(($users->username))</td>
    <td><img src="{{ $users->images }}" alt="ユーザーアイコン"></td>
</tr>
@endif
@endforeach

@endsection