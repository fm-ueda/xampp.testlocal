<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        /**
         *  hasmanyメソッドを呼び出すことでフォルダテーブルとタスクテーブルのリレーションを辿り
         *  フォルダクラスのインスタンスから紐づくタスククラスのリストを取得する
         */
        return $this->hasMany('App\Task');
    }
}
