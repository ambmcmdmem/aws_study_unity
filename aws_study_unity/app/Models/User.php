<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post() {
        // 第1引数がリレーションしたいクラス
        // 2が結合したい要素(Userじゃないほう)
        // 3が結合したい要素(User)
        return $this->hasOne('App\Models\Post', 'user_id', 'id');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function roles() {
        // 1引数は結合したいモデル
        // 2は結合を行うテーブル
        // 3は結合したい外部キー（User）
        // 4は結合したい外部キー（Role）
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id')->withPivot('id', 'created_at');
    }

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }
}
