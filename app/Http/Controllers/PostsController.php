<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//下記の内容を追記する
use Illuminate\Support\Facades\Auth;

use App\Post;


class PostsController extends Controller
{
//テストコード
    public function hello()
    {
        echo 'hello world!<br>';
        echo 'コントローラーを使ったルーティング成功です。';
    }

    //つぶやきをトップ画面に表示されるコード
    public function index()
    {
        $list = Post::get();
        return view('posts.index',['posts'=>$list]);
    }
    //
    /**
     * @param Request $request
     * @return Response
     */

    

    //つぶやきをデーターベースに登録するための処理
    public function create(Request $request)
    {
        $id = Auth::id();//ログインユーザーのid情報
        // dd($request);//でバック関数
        $post = $request->input('newPost');
        // dd($post);
        Post::create([
            'user_id' => $id,//$postになってしまっているので、ログインユーザーの情報が入っている変数
            'post' => $post,
        ]);
        return redirect('/top');
    }
    

//つぶやきを更新するためのコード
public function update(Request $request)
{
    // 1つ目の処理
    $id = $request->input('id');
    $up_post = $request->input('upPost');
    // 2つ目の処理
    Post::where('id', $id)->update(['post' => $up_post]);
    // 3つ目の処理
    return redirect('index');
}
//つぶやきを削除する為のコード
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('index');
    }
    
}
