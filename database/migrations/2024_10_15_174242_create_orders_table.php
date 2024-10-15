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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');  // 主キー
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // 外部キー：usersテーブルに関連
            $table->date('order_date');  // 注文日
            $table->string('status');  // 注文の状態（例：processing, shipped, deliveredなど）
            $table->decimal('total_amount', 10, 2);  // 注文の合計金額
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
        Schema::dropIfExists('orders');
    }
};
