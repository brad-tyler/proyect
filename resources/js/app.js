import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

import "primevue/resources/themes/lara-light-indigo/theme.css";
//core
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
// import 'primeflex/primeflex.css';

import PrimeVue from "primevue/config";

import ToastService from "primevue/toastservice";

import { canPermission, isRole } from "./Utils/LaravelPermissions";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        const myApp = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(PrimeVue)
            .use(ToastService);
        // .use(LaravelPermissionToVueJS);
        // .mount(el)
        myApp.config.globalProperties.can = canPermission;
        myApp.config.globalProperties.is = isRole;

        myApp.mount(el);
        return myApp;
    },
    progress: {
        color: "#4B5563",
    },
});
