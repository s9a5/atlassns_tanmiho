@extends('layouts.login')

@section('content')




        <!--投稿フォーム-->
<div class="container">
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::text('newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">投稿</button>
        {!! Form::close() !!}
    </div>
    <ul>
    <li class="post-block">
      <figure><img src="https://placehold.jp/50x50.png" alt="Bさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name"></div>
          <div></div>
        </div>
        <div><br>
</div>



    @foreach ($posts as $post)
       <tr>
           <td>{{ $post->id }}</td>
           <td>{{ $post->post }}</td>
           <td>{{ $post->created_at }}</td>
           <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>
           <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td> 
       </tr>
       @endforeach
       <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
@endsection