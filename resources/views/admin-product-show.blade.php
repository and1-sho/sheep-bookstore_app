<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/admin.css')
        @vite('resources/css/admins_css/product_show.css')
        @vite('resources/js/imageHandler_show.js')
    </head>

    <body>
        <div id="app">
            <div id="AdminHeader"></div>
            <article class="content_box">
                <h1 class="title">商品詳細</h1>
                <div class="content">
                    <article class="product_info">
                        <dl class="info_item">
                            <dt>書籍名：</dt>
                            <dd>{{ $product->product_name }}</dd>
                        </dl>
                        <dl class="info_item">
                            <dt>著者名：</dt>
                            <dd>{{ $product->author }}</dd>
                        </dl>
                        <dl class="info_item">
                            <dt>カテゴリ：</dt>
                            <dd>{{ optional($product->category)->category_name }}</dd>
                        </dl>
                        <dl class="info_item">
                            <dt>説明：</dt>
                            <dd>{{ $product->description }}</dd>
                        </dl>
                        <dl class="info_item">
                            <dt>金額：</dt>
                            <dd>{{ $product->price }}円</dd>
                        </dl>
                        <dl class="info_item item_end">
                            <dt>在庫数：</dt>
                            <dd>{{ $product->stock }}</dd>
                        </dl>
                    </article>

                    <!-- 画像がある場合は表示 -->
                    @php
                        // imagesが配列でない場合はJSONデコード
                        $images = is_array($product->images) ? $product->images : json_decode($product->images);
                    @endphp

                    @if (!empty($images) && is_array($images))
                        <article class="img_content">
                            <!-- メイン画像（最初の画像） -->
                            <div class="img_1">
                                <div id="mainImage" style="background-image: url('{{ asset('storage/' . $images[0]) }}')"></div>
                            </div>

                            <!-- サムネイル表示エリア -->
                            <div class="img_all">
                                <div id="thumbnails">
                                    @foreach ($images as $image)
                                        <div class="img thumbnail" style="background-image: url('{{ asset('storage/' . $image) }}');"></div>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    @else
                        <!-- デフォルト画像を表示 -->
                        <article class="img_content">
                            <div class="img_1">
                                <div id="mainImage" style="background-image: url('{{ asset('storage/images/default-image.png') }}')"></div>
                            </div>
                        </article>
                    @endif
                </div>

                <article class="btn_box">
                    {{-- 削除ボタン --}}
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete_btn" type="submit">削除</button>
                    </form>

                    <!-- 編集ボタン -->
                    <a class="btn" href="{{ route('admin.products.edit', $product->id) }}">編集する</a>

                    {{-- 戻るボタン --}}
                    <a class="btn return_btn" href="{{ route('admin.index') }}" >戻る</a>
                </article>
            </article>
        </div>
    </body>
</html>
