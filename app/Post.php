<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //↓下記を追加してください
    protected $fillable = [
        'post'
    ];
}
