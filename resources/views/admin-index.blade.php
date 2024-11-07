<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/admin.css')
        @vite('resources/css/admins_css/admin_index.css')
    </head>
    <body>
        <div id="app">
            <div id="AdminHeader"></div>
            <article class="content_box">
                <h1 class="title">一覧</h1>

                <article class="book_view">
                    @foreach ($products as $product)
                    <!-- 詳細画面のリンク -->
                    <a class="book_box" href="{{ route('admin.products.show', ['id' => $product->id]) }}">

                        <!-- 画像の表示 -->
                        <figure class="book_img">
                            @php
                                // 配列でない場合のみJSONデコードを実行
                                $images = is_array($product->images) ? $product->images : json_decode($product->images);
                            @endphp


                            @if (!empty($images) && is_array($images) && count($images) > 0 && !empty($images[0]))
                                    <!-- 最初の画像のみ表示 -->
                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $product->product_name }}">
                            @else
                                    <!-- デフォルト画像 -->
                                    <img src="{{ asset('storage/images/default-image.png') }}" alt="No Image Available">
                            @endif
                        </figure>

                        <div class="name">
                            <!-- 商品名の表示 -->
                            <h2>{{ $product->product_name }}</h2>

                            <!-- 著者の表示 -->
                            <p>著者: {{ $product->author }}</p>
                        </div>
                    </a>
                    @endforeach
                </article>

                <!-- 新規登録のリンク -->
                <div class="new_book"><a href="{{ route('admin.products.create') }}">新規登録</a></div>
            </article>
        </div>
    </body>
</html>
