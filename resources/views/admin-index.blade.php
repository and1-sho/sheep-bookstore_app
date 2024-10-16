<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/admin.css')
    </head>

    <body>
        <div id="app">
            <div id="AdminHeader"></div>
            <article class="content_box">
                <p class="title">一覧</p>
            </article>

            @foreach ($products as $product)
                <div>
                    <!-- 画像の表示 -->
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                    <!-- 商品名の表示 -->
                    <h2>{{ $product->product_name }}</h2>

                    <!-- 著者の表示 -->
                    <p>著者: {{ $product->author }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>
