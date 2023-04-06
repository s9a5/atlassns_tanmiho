<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//下記の内容を追記する
use Illuminate\Support\Facades\Auth;

use App\Post;


class PostsController extends Controller
{
// //テストコード
//     public function hello()
//     {
//         echo 'hello world!<br>';
//         echo 'コントローラーを使ったルーティング成功です。';
//     }

    //つぶやきをトップ画面に表示されるコード
    public function index()
    {
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
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
    
//投稿編集画面
public function edit($id)
{
 $post = \DB::table('posts')
         ->where('id', $request->id)
         ->get();
 return view('top', compact('post'));
 }

 //投稿更新
 public function postsupdate(Request $request, Post $post)
 {
     $id = $request->input('id');
     $up_post = $request->input('upPost');
     $up_post->post = $request->post;
     $up_post->fill($request->all())->save();

     $post = \DB::table('posts')
         ->where('id', $request->id)
         ->update(
             ['post' => $up_post]
         );

     return redirect('/top')->with('warning', '編集完了');
 }

//つぶやきを削除する為のコード
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
    
}
