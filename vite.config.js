import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

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
    ],
    resolve: {
        alias: {
            '@': '/resources/vue'
        }
    }
});
