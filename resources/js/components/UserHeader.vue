<template>
    <template class="header">
        <!-- ロゴのリンク -->
        <a href="http://localhost:8000">
            <article class="logo">
                <img class="logo_img" :src="logoImage" alt="Logo">
                <h1>SHeep</h1>
            </article>
        </a>

        <article class="icon">
            <!-- 新規登録とログイン選択の画面 -->
            <a href="#">
                <img class="icon_login" :src="loginIcon" alt="Login Icon">
            </a>
            <img class="icon_cart open" :src="cartIcon" alt="Cart Icon">
        </article>

        <!-- モーダル -->
        <div class="modal_bg"></div>
        <div class="container">
            <div class="close">
                <i></i>
                <i></i>
            </div>

            <p class="modal_name">カート</p>

            <article>
                <!-- カートに入れた商品を表示 -->


            </article>

            <article class="total_price">
                <div class="partition"></div>

                <!-- カートに入れた合計金額 -->
                <a class="btn" href="#">ご購入手続きへ　・ ¥（合計金額）JPY</a>
            </article>
        </div>

    </template>
</template>

<script setup>
// importで画像を指定
const logoImage = new URL('../../images/logo_img.png', import.meta.url).href;
const loginIcon = new URL('../../images/icon_login.png', import.meta.url).href;
const cartIcon = new URL('../../images/icon_cart.png', import.meta.url).href;
</script>

<style scoped>
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 17px 45px;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
}

.logo {
    display: flex;
    align-items: center;
}

.logo h1 {
    font-weight: bold;
    color: #222222;
    margin-left: 15px;
    letter-spacing: 0.01em;
}

.logo_img {
    width: 46px;
}

.icon {
    display: flex;
}

.icon_login,.icon_cart {
    width: 22px;
    height: 22px;
    cursor: pointer;
}

.icon_cart {
    margin-left: 22px;
}

/* モーダル */
.container {
    width: 400px;
    height: 100vh;
    position: fixed;
    top: 0;
    right: 0;
    background-color: #ffffff;
    opacity: 0;
    pointer-events: none; /* モーダルを閉じたときに要素も消せる */
    transition: 0.3s;
}

.container.active{
  opacity: 1;
  pointer-events: auto;
}

/* 閉じるボタン */
.close {
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
    width: 25px;
    height: 25px;
}

.close i {
    position: absolute;
    top: 2.5px;
    right: 2.5px;
    height: 1px;
    width: 20px;
    background-color: #222222;
    margin-top: 2.5px;
}
.close i:nth-of-type(1){
    top: 5px;
    transform: translateY(4px) rotate(45deg);
}
.close i:nth-of-type(2){
    top: 13px;
    transform: translateY(-4px) rotate(-45deg);
}

/* モーダルの中 */
.modal_name {
    font-size: 16px;
    margin: 15px 0 0 30px;
}

.total_price {
    position: fixed;
    bottom: 30px;
    right: 0;
}

.partition {
    width: 400px;
    height: 1px;
    background-color: #D4D2CB;
}

.btn {
    display: block;
    width: 340px;
    height: 50px;
    background-color: #1C1B1B;
    color: #ffffff;
    font-size: 12px;
    align-content: center;
    text-align: center;
    /* border-radius: 3px; */
    letter-spacing: 0.1em;
    margin: 30px auto;
}

/* モーダル背景 */
.modal_bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    pointer-events: none;
    opacity: 0;
    transition: 0.3s;
}

.modal_bg.active {
    opacity: 1;
}
</style>