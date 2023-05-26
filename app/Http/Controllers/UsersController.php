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

    //検索結果を表示させる
    public function search(){
      
        // ユーザー一覧をページネートで取得
        $users = User::paginate(20);
      
      // ビューにusersとsearchを変数として渡す
      return view('users.search')
          ->with([
              'users' => $users,
          ]);
    }
      //ユーザー検索の処理を実装する
    public function getIndex(Request $rq)
    {
        //キーワード受け取り
        $keyword = $rq->input('search');
    
        //クエリ生成
        $query = \App\Student::query();
    
        //もしキーワードがあったら
        if(!empty($search))
        {
            $query->orWhere('name','like','%'.$search.'%');
        }
    
        // 全件取得 +ページネーション
        $students = $query->orderBy('id','desc')->paginate(5);
        return view('student.list')->with('students',$students)->with('search',$search);
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

// プロフィール編集項目の入力フォームを設置する
