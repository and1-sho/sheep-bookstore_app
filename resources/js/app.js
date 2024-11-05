import './bootstrap';

import { createApp } from "vue";
import AdminHeader from './components/AdminHeader.vue';
import UserHeader from './components/UserHeader.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// #AdminHeader が存在する場合のみ AdminHeader をマウント
if (document.getElementById('AdminHeader')) {
    const existingAdminHeaderApp = document.querySelector('#AdminHeader').__vue_app__;
    if (existingAdminHeaderApp) {
        existingAdminHeaderApp.unmount();
    }
    const AdminHeaderApp = createApp(AdminHeader);
    AdminHeaderApp.mount('#AdminHeader');
}

// #UserHeader が存在する場合のみ UserHeader をマウント
if (document.getElementById('UserHeader')) {
    const existingUserHeaderApp = document.querySelector('#UserHeader').__vue_app__;
    if (existingUserHeaderApp) {
        existingUserHeaderApp.unmount();
    }
    const UserHeaderApp = createApp(UserHeader);
    UserHeaderApp.mount('#UserHeader');
}

// モーダル（ログアウト）の表示非表示
{
	const open = document.querySelector('.open');
	const container = document.querySelector('.container');
    const modalBg = document.querySelector('.modal_bg');
    const close = document.querySelector('.close');

	open.addEventListener('click', () => {
		container.classList.add('active');
		modalBg.classList.add('active');
	});

    close.addEventListener('click', () => {
		container.classList.remove('active');
		modalBg.classList.remove('active');
	});
}

// 画像のハンドリングのためのコードをインポート
import './imageHandler';