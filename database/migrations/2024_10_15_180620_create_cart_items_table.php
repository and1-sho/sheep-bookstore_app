<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');  // 外部キー：cartsテーブルに関連
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');  // 外部キー：productsテーブルに関連
            $table->integer('quantity');  // 商品の数量
            $table->primary(['cart_id', 'product_id']);  // 複合主キー
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
