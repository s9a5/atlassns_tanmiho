<?php

namespace App\http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{

    public function user() {
        return $this->hasMany('App\User');
    }

    //フォローしているユーザーを取得
    public function followings()
    {
        return $this->belongsToMany('App\Follow','Follows',
        'followed_id','following_id');
    }

    //フォローされているユーザーを取得
    public function followers()
    {
        return $this->belongsToMany('App\Follow','Follows',
        'followed_id','following_id');
    }

    //フォローする
    public function follow(User $data)
    {
        $this->followings()->attach($data->id);
    }

    //フォローを削除する
    public function unfollow(User $data)
    {
        $this->followings()->detach($data->id);
    }

    //フォローしているかどうか判断する
    public function inFollowing(User $data)
    {
        return $this->Following()->where('following_id',$data->id)
        ->exists();
    }

    //
    public function show(User $user)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
