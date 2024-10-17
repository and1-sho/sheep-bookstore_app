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
        <h1>新規商品登録</h1>

        <!-- エラーメッセージの表示 -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- 商品登録フォーム -->
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="product_name">商品名:</label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" required>
            </div>

            <div>
                <label for="author">著者:</label>
                <input type="text" name="author" value="{{ old('author') }}">
            </div>

            <div>
                <label for="category_id">カテゴリー:</label>
                <select name="category_id" required>
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="description">説明:</label>
                <textarea name="description" required>{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="price">価格:</label>
                <input type="number" name="price" value="{{ old('price') }}" >
            </div>

            <div>
                <label for="stock">在庫数:</label>
                <input type="number" name="stock" value="{{ old('stock') }}" required>
            </div>

            <div>
                <label for="image">商品画像:</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div>
                <button type="submit">商品を登録</button>
            </div>
        </form>
    </body>
</html>
