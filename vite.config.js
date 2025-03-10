import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import AutoImport from 'unplugin-auto-import/vite';
import Components from 'unplugin-vue-components/vite';
import {ElementPlusResolver} from "unplugin-vue-components/resolvers";


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/vue/app.ts',
                'resources/sass/app.scss'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAttributes: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        }),
        AutoImport({
            resolvers: [ElementPlusResolver()],
        }),
        Components({
            resolvers: [ElementPlusResolver()],
        }),
    ],
    css: {
        preprocessors: {
            scss: {
                api: 'modern-compiler',
            }
        }
    },
    resolve: {
        alias: {
            '@': '/resources/vue'
        }
    }
});
