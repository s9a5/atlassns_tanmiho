<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//下記の内容を追記する
use Illuminate\Support\Facades\Auth;

use App\Post;


class PostsController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Response
     */

    
     //投稿画面を表示させる処理
    public function index(){
        return view('posts.index');
    }

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
    

//参考の為に記述したコード
    public function updateForm($id)
    {
        $post = Post::where('id', $id)->first();
        return view('posts.updateForm', ['post'=>$post]);
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('index');
    }
}
