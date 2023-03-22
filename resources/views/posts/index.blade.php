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
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::text('newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">投稿</button>
        {!! Form::close() !!}
    </div>
    <h2 class="page-header">投稿一覧</h2>
    <footer>
        <small></small>
    </footer>



    @foreach ($posts as $post)
       <tr>
           <td>{{ $post->id }}</td>
           <td>{{ $post->post }}</td>
           <td>{{ $post->created_at }}</td>
           <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>
           <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td> 
       </tr>
       @endforeach
@endsection