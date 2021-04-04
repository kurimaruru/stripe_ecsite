<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // CartからProductにアクセスするリレーション
    public function products()
    {
        // 多対多のリレーション
        return $this->belongsToMany(
            // 第一引数は関係するモデルクラス
            Product::class,
            // 第二引数は中間テーブル
            'line_items',
        )->withPivot(['id','quantity']); //中間テーブルの情報にアクセスするためには以下のようなpivotプロパティを使う
        
    }
}
