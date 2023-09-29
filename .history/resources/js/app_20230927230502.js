import './bootstrap';
import '../css/app.css';

import '../awasome/fontawesome-free-6.4.0-web/css/all.min.css';
import '../awasome/fontawesome-free-6.4.0-web/css/brands.min.css';
import '../awasome/fontawesome-free-6.4.0-web/css/fontawesome.min.css';
import '../awasome/fontawesome-free-6.4.0-web/css/regular.min.css';
import '../awasome/fontawesome-free-6.4.0-web/css/solid.min.css';
import '../awasome/fontawesome-free-6.4.0-web/css/svg-with-js.min.css';
import '../awasome/fontawesome-free-6.4.0-web/css/v4-shims.min.css';
import '../awasome/fontawesome-free-6.4.0-web/js/all.min.js';
import '../awasome/fontawesome-free-6.4.0-web/js/brands.min.js';
import '../awasome/fontawesome-free-6.4.0-web/js/fontawesome.min.js';
import '../awasome/fontawesome-free-6.4.0-web/js/regular.min.js';
import '../awasome/fontawesome-free-6.4.0-web/js/regular.js';
import '../awasome/fontawesome-free-6.4.0-web/js/solid.min.js';

import BaseLayout from 'Components/Layouts/BaseLayout.vue';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('base-layout', BaseLayout)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
