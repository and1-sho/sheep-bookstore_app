<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/admin.css')
        @vite('resources/css/admins_css/index.css')
    </head>

    <body>
        <h1>商品詳細</h1>

        <h1>書籍名:{{ $product->product_name }}</h1>
        <p>金額: {{ $product->price }}</p>
        <p>説明: {{ $product->description }}</p>
        <p>著者名: {{ $product->author }}</p>
        <p>在庫数: {{ $product->stock }}</p>

        <!-- 画像がある場合は表示 -->
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        @endif

        {{-- 削除ボタン --}}
        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
        
        {{-- 戻るボタン --}}
        <a href="{{ route('admin.index') }}" >戻る</a>
    </body>
</html>
