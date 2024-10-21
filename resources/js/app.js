import './bootstrap';

import { createApp } from "vue";
import AdminHeader from './components/AdminHeader.vue';

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