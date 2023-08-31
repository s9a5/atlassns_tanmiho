<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;


class FollowsController extends Controller
{
    //
    public function followList(){
        $following_id = Auth::user()
        ->pluck('followed_id');
        $posts =Post::with('user')->whereIn
        ('user_id', $following_id)->latest()->get;
        return view('follows.followList',
        ['follows' => $follows,'posts' => $posts]);
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
