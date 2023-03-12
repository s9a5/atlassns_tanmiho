<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     // 4.1 ログインユーザーのつぶやきを登録
    public static function bootUserable()
    {
        static::addGlobalScope('mine', function(Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
        
        static::creating(function (Model $model) {
            $model->user_id = auth()->id();
        });
    }


    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
        {
            return $this->hasMany('App\Post');
        }

    //フォロー、フォロワー//
    public function follow($user_id)
    {
        return $this->follows()->attach($user_id);
    }

    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }

    public function isFollowing($user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->exists();
    }

    public function isFollowed($user_id)
    {
        return (bool) $this->followers()->where('following_id', $user_id)->exists();
    }
    
}
