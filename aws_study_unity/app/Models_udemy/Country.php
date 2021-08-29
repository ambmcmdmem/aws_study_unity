<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function posts() {
        // 1がつなげたいモデル
        // 2が経由するモデル
        // 3がこのモデルの外部キー
        // 4が1の外部キー
        // 5がこのモデルのローカルキー（主キー）
        // 6が1のローカルキー（主キー）
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User', 'country_id', 'user_id', 'id', 'id');
    }

}
