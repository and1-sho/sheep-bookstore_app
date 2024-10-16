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
        Schema::create('order_items', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');  // 外部キー：ordersテーブルに関連
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');  // 外部キー：productsテーブルに関連
            $table->integer('quantity');  // 注文アイテムの数量
            $table->decimal('price', 10, 2);  // 商品の価格
            $table->primary(['order_id', 'product_id']);  // 複合主キー
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
