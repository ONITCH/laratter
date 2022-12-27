<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // アプリケーション側でcreateなどできない値を記述する
    // 🔽 以下の処理を記述
    //ブラックリスト（ホワイトリストもある$fillable）
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    // 🔽 追加
    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }
    // 🔽 追加
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔽 追加 for favorite function
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
