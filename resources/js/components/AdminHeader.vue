<template>
    <template class="header">
        <!-- ロゴのリンク -->
        <a href="#">
            <article class="logo">
                <img class="logo_img" :src="logoImage" alt="Logo">
                <h1>SHeep</h1>
            </article>
        </a>

        <img class="icon_login open" :src="loginIcon" alt="Login Icon">

        <!-- モーダル -->
        <div class="modal_bg"></div>
        <div class="container">
            <div class="close">
                <i></i>
                <i></i>
            </div>
            <img class="icon_admin" :src="loginIcon" alt="Login Icon">

            <!-- ログインしているユーザー名が入ります -->
            <p class="user_name">ユーザー名</p>

            <!-- ログアウトのリンク -->
            <button class="Logout" onclick="location.href='#'">ログアウト</button>
        </div>

    </template>
</template>

<script setup>
// importで画像を指定
const logoImage = new URL('../../images/logo_img.png', import.meta.url).href;
const loginIcon = new URL('../../images/icon_login.png', import.meta.url).href;
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
}

.logo_img {
    width: 46px;
}

.icon_login {
    width: 22px;
    height: 22px;
    cursor: pointer;
}

/* モーダル */
.container {
    width: 330px;
    height: 280px;
    position: fixed;
    top: 60px;
    right: 50px;
    background-color: #ffffff;
    opacity: 0;
    pointer-events: none; /* モーダルを閉じたときに要素も消せる */
    text-align: center;
    border-radius: 10px;
    align-content: center;
    transition: 0.3s;
}

.container.active{
  opacity: 1;
  pointer-events: auto;
}

/* 閉じるボタン */
.close {
    cursor: pointer;
}

.close i {
    position: absolute;
    top: 15px;
    right: 15px;
    height: 1px;
    width: 20px;
    background-color: #222222;
    margin-top: 15px;
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
.icon_admin {
    margin: 0 auto;
    width: 68px;
    margin-bottom: 14px;
}

.user_name {
    font-size: 16px;
    font-weight: bold;
    color: #222222;
}

.Logout {
    width: 190px;
    height: 40px;
    margin-top: 30px;
    background-color: #524E4E;
    border-radius: 3px;
    color: #ffffff;
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