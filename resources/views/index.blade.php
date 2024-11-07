<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/user_css/index.css')
</head>

<body>
    <div id="app">
        <div id="UserHeader"></div>
        <article class="content_box">
            @foreach ($products as $product)
            <!-- 詳細画面のリンク -->
            <a class="book_box" href="#">
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

                <!-- 価格の表示 -->
                <p class="price">¥0,000<span>（税込）</span></p>
            </a>
            @endforeach
        </article>
    </div>
</body>
</html>
