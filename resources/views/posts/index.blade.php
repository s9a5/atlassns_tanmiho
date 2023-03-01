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
        <h2 class="page-header"></h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">投稿</button>
        {!! Form::close() !!}
    </div>
    <footer>
        <small></small>
    </footer>
@endsection