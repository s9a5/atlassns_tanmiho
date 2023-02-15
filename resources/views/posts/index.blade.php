@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<table class="table table-hover">
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($list as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
                  ↓ ここを追加してください
                <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
                ↓ ここを追加してください
                <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>           
            @endforeach
        </table>
@endsection