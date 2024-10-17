<template>
    <template class="header">
        <!-- TOPページのリンク -->
        <a href="#">
            <article class="logo">
                <img class="logo_img" :src="logoImage" alt="Logo">
                <h1>SHeep</h1>
            </article>
        </a>
        <img class="icon_login" :src="loginIcon" alt="Login Icon">
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
}
</style>