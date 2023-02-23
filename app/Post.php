<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //↓下記を追加してください
    protected $fillable = [
        'post'
    ];

    // 4.1 ログインユーザーのつぶやきを登録
    public function postStore(Int $user_id, array $data)
    {
        $this->user_id = $user_id;
        $this->posts = $data['posts'];
        $this->save();

        return;
    }
}
