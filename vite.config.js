import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/jquery.min.js',
                'resources/js/bootstrap.min.js',
                'resources/js/custom.js',
            ],
            refresh: true,
        }),
    ],
});
