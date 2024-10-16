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
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // 主キー
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  // 外部キー：categoriesテーブルに関連
            $table->string('product_name');  // 商品名
            $table->string('author')->nullable(); // 著者名
            $table->text('description');  // 商品の説明
            $table->decimal('price', 10, 2);  // 価格
            $table->integer('stock');  // 在庫数
            $table->string('image')->nullable();  // 商品画像
            $table->timestamps();  // 作成日と更新日
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
