<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 商品一覧を表示
Route::get('/admin', [AdminProductController::class, 'index'])->name('admin.index');
// 商品登録フォームを表示
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
// 商品を保存する
Route::post('admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
//詳細情報を表示
Route::get('admin/products/{id}',[AdminProductController::class, 'show'])->name('admin.products.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
