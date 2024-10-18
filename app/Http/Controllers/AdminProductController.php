<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // トップ画面を表示するメソッド
    public function index()
    {
        // 全てのプロダクトデータを取得
        $products = Product::all();

         // admin-index.blade.phpを表示
        return view('admin-index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 商品登録フォームを表示するメソッド
    public function create()
    {
        // カテゴリーを全て取得（仮にCategoryモデルがある場合）
    $categories = \App\Models\Category::all();

    // ビューにカテゴリーを渡して表示
    return view('admin-product-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 商品を保存するメソッド
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'product_name' => 'required|string|max:255', // 商品名
            'author' => 'nullable|string|max:255', // 著者（任意）
            'category_id' => 'required|integer|exists:categories,id', // カテゴリーID（存在するもの）
            'description' => 'required|string', // 説明
            'price' => 'required|numeric|min:0', // 価格（0以上）
            'stock' => 'required|integer|min:0', // 在庫数（0以上の整数）
            'image' => 'nullable|image|max:2048', // 画像（任意、最大2MB）
        ]);

        // 画像を保存
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // データを保存
        Product::create($validated);

        // 登録後にリダイレクト
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 商品のデータをIDで検索
        $product = Product::find($id);

        //商品が見つからなかった場合の処理
        if(!$product){
            return redirect()->route(admin.product.index);
        }

        return view('admin-product-show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 商品を取得して削除
    $product = Product::findOrFail($id); // 存在しないIDの場合は404を返す
    $product->delete();

    // 削除後のリダイレクトやメッセージ
    return redirect()->route('admin.index');
    }
}