<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $imgPath = '/images/';
    protected $dates = ['deleted_at'];

    // createを許可
    protected $fillable = [
        'title',
        'contents',
        'user_id',
        'path'
    ];

    public function user() {
        // 第1引数がこのアイテムを持つモデルを指定
        // 2がこのモデルの外部キーを指定(=user_id)
        // 3がこのアイテムを持つモデルのキーを指定(=id)
        return $this->belongsTo('App\Models\User');
    }

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags() {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public function getPathAttribute($value) {
        if(empty($value)) {
            return '';
        } else {
            return $this->imgPath . $value;
        }
    }

    public static function scopeTest($query) {
        return $query->orderBy('updated_at', 'DESC');
    }
}
