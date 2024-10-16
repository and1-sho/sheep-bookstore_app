<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name'=> '絵本'],
            ['category_name'=> '参考書'],
            ['category_name'=> '雑誌'],
            ['category_name'=> '漫画'],
        ]);
    }
}
