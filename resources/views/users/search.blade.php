@extends('layouts.login')

@section('content')
<p>検索</p>

<form>
 <input type="url" name="sample">
 <button type="submit">検索</button>
</form>


<form method="GET" action="{{ route('users.index') }}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('users.index') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>

@foreach($users as $user)
    <a href="{{ route('users.show', ['user_id' => $user->id]) }}">
        {{ $user->name }}
    </a>

   
    
@endforeach