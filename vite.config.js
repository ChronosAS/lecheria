import { defineConfig } from 'vite';
import path from 'path';
import laravel from 'laravel-vite-plugin';
import jQuery from 'jquery';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/scss/app.scss',
                'resources/js/bootstrap.js',
                'public/css/app.css',
                'public/js/app.js'
            ],
            refresh: true,
        }),
    ],
    resolve:{
        alias: {
            '$': 'jQuery',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    }
});
