<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/admin.css')
        @vite('resources/css/admins_css/product_create.css')
    </head>

    <body>
        <div id="app">
            <div id="AdminHeader"></div>
            <article class="content_box">
                <h1 class="title">新規商品登録</h1>

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

                    <div class="content">
                        <article class="product_info">
                            <div class="info_box">
                                <label for="product_name">商品名</label>
                                <input class="input" type="text" name="product_name" value="{{ old('product_name') }}" required>
                            </div>

                            <div class="info_box">
                                <label for="author">著者</label>
                                <input class="input" type="text" name="author" value="{{ old('author') }}">
                            </div>

                            <div class="info_box">
                                <label for="category_id">カテゴリー</label>
                                <select class="input" name="category_id" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="info_box explanation">
                                <label for="description">説明</label>
                                <textarea class="input textarea" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="info_box">
                                <label for="price">価格</label>
                                <input class="input price-input" type="number" name="price" value="{{ old('price') }}" >
                            </div>

                            <div class="info_box">
                                <label for="stock">在庫数</label>
                                <input class="input" type="number" name="stock" value="{{ old('stock') }}" required>
                            </div>
                        </article>

                        <article class="product_img">
                            <article class="img_content">

                                <!-- 選択した画像 -->
                                <div class="img_1"></div>

                                <div class="img_all">
                                    <!-- ここに複数の画像のサムネが入ります -->
                                    <div class="img"></div>
                                </div>
                            </article>

                            <div class="add_img">
                                <label for="image">商品画像</label>
                                <input class="input" type="file" name="image" accept="image/*">
                            </div>

                            <!-- 画像削除ボタン -->
                            <button class="delete_btn" type="submit">画像を削除</button>
                        </article>
                    </div>

                    <div class="btn_box">
                        <a class="btn return_btn" href="{{ route('admin.index') }}" >戻る</a>
                        <button class="btn" type="submit">商品を登録</button>
                    </div>
                </form>
            </article>
        </div>
    </body>
</html>
