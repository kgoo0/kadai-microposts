<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この投稿をお気に入りしているユーザ。（ Userモデルとの関係を定義）
     * 第三引数には中間テーブルに保存されている自分のidを示すカラム名
     * 第四引数には中間テーブルに保存されている関係先のidを示すカラム名
     */
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'id', 'user_id')->withTimestamps();
    }

}
