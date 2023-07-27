import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
// import basicSsl from "@vitejs/plugin-basic-ssl";
// import { VitePWA } from "vite-plugin-pwa";

export default defineConfig({
    plugins: [
        // basicSsl(),
        laravel({
            input: "resources/js/app.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        // VitePWA({
        //     strategies: "injectManifest",
        //     manifest: {
        //         name: "testProject",
        //         short_name: "testProject",
        //         icons: [
        //           {
        //             src: "/android-chrome-192x192.png",
        //             sizes: "192x192",
        //             type: "image/png",
        //             purpose: "any maskable",
        //           },
        //           {
        //             src: "/android-chrome-512x512.png",
        //             sizes: "512x512",
        //             type: "image/png",
        //             purpose: "any maskable",
        //           },
        //         ],
        //       },
        //     injectRegister: false,
        //     manifest: false,
        //     devOptions: {
        //       enabled: true
        //     }
        //   })
    ],
});
