<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // ここで登録・更新時に代入可能なカラムを指定
    protected $fillable = ['product_id', 'image_path', 'sort_order'];

    // 商品とのリレーション（多対1）
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}