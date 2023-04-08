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
        <ul>
    <li class="post-block">
      <figure><img src="https://placehold.jp/50x50.png" alt="Aさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">{{Auth::user()->username}}</div>
          <div>2022-12-22</div>
        </div>
        <div>投稿内容<br>投稿内容</div>
      </div>
    </li>  
    <li class="post-block">
      <figure><img src="https://placehold.jp/50x50.png" alt="Bさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">Bさん</div>
          <div>2022-12-22</div>
        </div>
        <div>投稿内容<br>投稿内容</div>
      </div>
    </li>  
    <li class="post-block">
      <figure><img src="https://placehold.jp/50x50.png" alt="Cさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">Cさん</div>
          <div>2022-12-22</div>
        </div>
        <div>投稿内容<br>投稿内容</div>
      </div>
    </li>  
  </ul>
    </div>



    @foreach ($posts as $post)
       <tr>
           <td>{{ $post->id }}</td>
           <td>{{ $post->post }}</td>
           <td>{{ $post->created_at }}</td>
           <!-- 投稿の編集ボタン -->
        <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">更新</a></td> 
           <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td> 
       </tr>
       @endforeach
       
       <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update" method="post">
                <textarea name="post" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
@endsection