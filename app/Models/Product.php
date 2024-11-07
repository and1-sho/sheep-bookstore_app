<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'author',
        'description',
        'price',
        'stock',
        'images', // 複数画像を格納するカラム
        'category_id',
    ];

    protected $casts = [
        'images' => 'array', // JSONを配列にキャスト
    ];
}
