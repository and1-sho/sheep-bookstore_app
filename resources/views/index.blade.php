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
                        <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}">
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
