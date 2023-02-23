<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostsController extends Controller
{
    //
    
    public function index(){
        return view('posts.index');
    }
    // ...
    //投稿フォーム//
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        Post::create(['post' => $post]);
        return view('posts.login.blade.php');
    }
    
// 4.1 ログインユーザーのつぶやきを登録
public function store(Request $request, Post $post)
{
    $user = auth()->user();
    $data = $request->all();
    $validator = Validator::make($data, [
        'posts' => ['required', 'string', 'max:150']
    ]);

    $validator->validate();
    $post->postStore($user->id, $data);

    return redirect('top');
}

    public function updateForm($id)
    {
        $post = Post::where('id', $id)->first();
        return view('posts.updateForm', ['post'=>$post]);
    }

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

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('index');
    }
}
