<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/admin.css')
        @vite('resources/css/admins_css/product_edit.css')
        @vite('resources/js/imageHandler_edit.js')
    </head>

    <body>
        <div id="app">
            <div id="AdminHeader"></div>
            <article class="content_box">
                <h1 class="title">商品編集</h1>

                <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="content">
                        <article class="product_info">
                            <div class="info_box">
                                <label for="product_name">商品名</label>
                                <input class="input" type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                            </div>

                            <div class="info_box">
                                <label for="author">著者</label>
                                <input class="input" type="text" id="author" name="author" value="{{ $product->author }}">
                            </div>

                            <div class="info_box">
                                <label for="category_id">カテゴリー</label>
                                <select class="input" name="category_id" id="category_id" required>
                                    <option value="">選択してください</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="info_box explanation">
                                <label for="description">説明</label>
                                <textarea class="input textarea" name="description" id="description" required>{{ $product->description }}</textarea>
                            </div>

                            <div class="info_box">
                                <label for="price">価格</label>
                                <input class="input price-input" type="number" id="price" name="price" value="{{ $product->price }}" >
                            </div>

                            <div class="info_box">
                                <label for="stock">在庫数</label>
                                <input class="input" type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
                            </div>
                        </article>

                        <article class="product_img">
                            <article class="img_content">
                                <!-- 初期画像を渡す隠し入力 -->
                                <input type="hidden" id="initialImage" value="{{ $product->image ? asset('storage/' . $product->image) : '' }}">

                                <!-- 選択した画像（メイン画像） -->
                                <div class="img_1">
                                    <div id="mainImage" style="background-image: url('{{ $product->image ? asset('storage/' . $product->image) : '' }}');"></div>
                                </div>

                                <!-- サムネイル -->
                                <div class="img_all">
                                    <div id="thumbnails">
                                        @if ($product->image)
                                            <div class="img" style="background-image: url('{{ asset('storage/' . $product->image) }}');"></div>
                                        @endif
                                    </div>
                                </div>
                            </article>

                            <div class="add_img">
                                <label for="image">商品画像</label>
                                <input class="input" id="imageInput" type="file" name="image" accept="image/*" multiple>
                            </div>

                            <!-- 画像削除ボタン -->
                            <button class="delete_btn" type="button" id="deleteButton">現在の画像を削除</button>
                        </article>
                    </div>

                    <!-- 商品の登録ボタン -->
                    <div class="btn_box">
                        <button class="btn" type="submit">商品を登録</button>
                    </div>
                </form>
            </article>
        </div>
    </body>
</html>
