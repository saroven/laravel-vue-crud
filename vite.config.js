import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import axios from 'axios';


import vue from '@vitejs/plugin-vue';

vue.prototype.$axios = axios;

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'],

            refresh: true,
        }),
    ],
});
