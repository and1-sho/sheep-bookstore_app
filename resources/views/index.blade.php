<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>商品一覧</h1>
@foreach ($products as $product)
        <!-- 画像の表示 -->
        <figure class="book_img">
                <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}">
        </figure>
        <!-- 商品名の表示 -->
        <h2>{{ $product->product_name }}</h2>

        <!-- 著者の表示 -->
        <p>著者: {{ $product->author }}</p>
@endforeach
</body>
</html>
