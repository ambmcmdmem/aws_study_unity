<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $imgPath = 'storage/';
    
    protected $guarded = [];

    public function user() {
        // 第1引数がこのアイテムを持つモデルを指定
        // 2がこのモデルの外部キーを指定(=user_id)
        // 3がこのアイテムを持つモデルのキーを指定(=id)
        return $this->belongsTo('App\Models\User');
    }

    public function getPostImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        } elseif(!empty($value)) {
            return asset($this->imgPath . $value);
        }
    }

    // public function setPostImageAttribute($value) {
    //     if (!empty($value) && (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE)) {
    //         $this->attributes['post_image'] = asset($this->imgPath . $value);
    //     }
    // }
}
