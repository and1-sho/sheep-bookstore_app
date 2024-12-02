<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // DBファサードをインポート
use Illuminate\Support\Facades\Hash;  // Hashファサードもインポート

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',  // 管理者の名前
            'email' => 'admin@test.com',  // 管理者のメールアドレス
            'password' => Hash::make('password'),  // ハッシュ化されたパスワード
            'address' => 'Address',  // 管理者の住所（例として追加）
            'role' => 'admin',  // 管理者を識別するための値
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User',  // 管理者の名前
            'email' => 'user@test.com',  // 管理者のメールアドレス
            'password' => Hash::make('password'),  // ハッシュ化されたパスワード
            'address' => 'Address',  // 管理者の住所（例として追加）
            'role' => 'user',  // 管理者を識別するための値
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
