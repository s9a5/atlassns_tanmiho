<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;


class Post extends Model
{
    //↓下記を追加してください
    protected $fillable = [
        'user_id', 'posts',
    ];
  
      public function Users()
      {
          return $this->belongsTo('App\User');
      }

    // 4.1 ログインユーザーのつぶやきを登録
    public function postStore(Int $user_id, array $data)
    {
        $this->user_id = $user_id;
        $this->posts = $data['posts'];
        $this->save();

        return;
    }
}

