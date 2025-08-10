<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // 紐づく商品
            $table->string('image_path');             // 画像の保存パス
            $table->integer('sort_order')->default(0); // 画像の順番（例：1枚目・2枚目）

            $table->timestamps();

            // 外部キー制約（商品が削除されたら画像も削除）
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
};