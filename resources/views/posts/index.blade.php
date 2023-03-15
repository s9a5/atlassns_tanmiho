@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<table class="table table-hover">
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
                <th></th>
            </tr>
            
        </table>



        <!--投稿フォーム-->
<div class="container">
        <h2 class="page-header">投稿一覧</h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::text('newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">投稿</button>
        {!! Form::close() !!}
    </div>
    <footer>
        <small></small>
    </footer>

    @foreach ($posts as $posts)
       <tr>
           <td>{{ $post->id }}</td>
           <td>{{ $item->name }}</td>
           <td>{{ $list->created_at }}</td>
           <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
           ↓ ここを追加してください
           <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete">削除</a></td>
       </tr>
       @endforeach
@endsection