<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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

    // プロフィール編集項目の入力フォームを設置する
    public function profiledit(Request $request)
    {
      $id = $request->input('id');
      $usesrname = $request->input('name');
      $mail = $request->input('mail');
      $password = $request->input('password');
      $bio = $request->input('bio');
      $icon = $request->input('icon');

      $update = [
        'username' => 'join',
        'mail' => 'join@icloud',
        'password' => 'bcrypt',
        'bio' => '勉強中',
        'images' => 'icon',
      ];
      dd($update);
      
      //2つ目の処理
      User::where('id',$id)->update([$update]);
      return redirect('/top');
    }

    //検索結果を表示させる
    public function search(Request $Request){
        $users = User::get(); //Bookモデル（booksテーブル）からレコード情報を取得
       
      // ビューにusersとsearchを変数として渡す
      return view('users.search')
          ->with([
              'users' => $users,
          ]);
    }
      //ユーザー検索の処理を実装する
    public function getIndex(Request $Request)
    {
        $users = User::get(); //Bookモデル（booksテーブル）からレコード情報を取得
        //キーワード受け取り

        $searchWard = $request->input('searchWord');
        
        //もしキーワードがあったら
        if($request->isMethod('post'))
        {
          return view('uesres.search',
          ['searchWord'=>$searchWard]);
        }else{
          return view('uesres.search',['users',$users]);
        }
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

