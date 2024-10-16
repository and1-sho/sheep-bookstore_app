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