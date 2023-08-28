@extends('layouts.login')

@section('content')
<p>フォローリスト</p>

<!-- フォローしている人のアイコン一覧 -->
<div classz="">
    <h2>Follow List</h2>
    @foreach ($follows as $follow)
    <ul>
        <li>
            <!-- アイコンひとまとめ -->
            <div class="follow_icon"><img src="{{ asset('storage/'.$follow->images) }}"
            alt="フォローアイコン"></div>
        </li>
    <ul>
@foreachend

</div>
@endsection
