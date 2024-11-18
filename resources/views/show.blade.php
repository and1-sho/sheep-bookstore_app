<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/user_css/user_show.css')
        @vite('resources/js/imageHandler_show.js')
    </head>

    <body>
        <div id="app">
            <div id="UserHeader"></div>
            <article class="content_box">
                <div class="content">
                    <!-- 画像がある場合は表示 -->
                    @php
                        // imagesが配列でない場合はJSONデコード
                        $images = is_array($product->images) ? $product->images : json_decode($product->images);
                    @endphp

                    @if (!empty($images) && is_array($images))
                        <article class="img_content">
                            <!-- サムネイル表示エリア -->
                            <div class="img_all">
                                <div id="thumbnails">
                                    @foreach ($images as $image)
                                        <div class="img thumbnail" style="background-image: url('{{ asset('storage/' . $image) }}');"></div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- メイン画像（最初の画像） -->
                            <div class="img_1">
                                <div id="mainImage" style="background-image: url('{{ asset('storage/' . $images[0]) }}')"></div>
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

                    <article class="product_info">
                        {{-- 著者名 --}}
                        <p class="author">{{ $product->author }}</p>

                        {{-- 本のタイトル --}}
                        <h1>{{ $product->product_name }}</h1>

                        {{-- 金額 --}}
                        <p class="price">¥{{ $product->price }}<span>（税込）</span></p>

                        {{-- 説明 --}}
                        <p class="description">{{ $product->description }}</p>

                        <article class="select_box">
                            {{-- カウンター（vue） --}}
                            <div id="Counter"></div>

                            {{-- カート追加ボタン --}}
                            <a class="btn add_btn" href="#">カートに追加する</a>

                            {{-- 購入ボタン --}}
                            <a class="btn" href="#">購入する</a>

                            {{-- 戻るボタン --}}
                            <a class="btn return_btn" href="http://localhost:8000">戻る</a>
                        </article>
                    </article>
                </div>
            </article>
        </div>
    </body>
</html>
