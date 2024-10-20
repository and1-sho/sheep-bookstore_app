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
        <h1>商品編集</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="product_name">商品名:</label>
                <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
            </div>

            <div>
                <label for="author">著者:</label>
                <input type="text" id="author" name="author" value="{{ $product->author }}">
            </div>

            <div>
                <label for="category_id">カテゴリー:</label>
                <select name="category_id" id="category_id" required>
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
                <textarea name="description" id="description" required>{{ $product->description }}</textarea>
            </div>

            <div>
                <label for="price">価格:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" >
            </div>

            <div>
                <label for="stock">在庫数:</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
            </div>

            <div>
                <label for="image">商品画像:</label>
                <input type="file" id="image" name="image" accept="image/*">
                <!-- 画像が存在する場合のみ表示 -->
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px;">
                @endif
            </div>

            <div>
                <button type="submit">商品を登録</button>
            </div>
        </form>
    </body>
</html>
