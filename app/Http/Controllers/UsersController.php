<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 4.1 ログインユーザーのつぶやきを画面表示させる//
class PostController extends Controller
{
  public function index()
  {
      $posts = Post::where('user_id', \Auth::user()->id)->get();

      return view('posts.index', [
        'post'=> $post,'user'=>$user
      ]);
  }
}

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    /**
   * 登録フォーム
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    // まだ登録されているuserはないので、空っぽのUserインスタンスをViewに渡す
    $user = $this->user;
    return view('user.create', compact('user'));
  }
}
