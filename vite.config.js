import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import jQuery from 'jquery';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
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
        }
    }
});
