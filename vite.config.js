import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [

                // JS
                'resources/assets/js/app.js',
                'resources/assets/js/theme-mode.js',

                // CSS
                'resources/assets/css/app.css',
                'resources/assets/mv/plugins.bundle.css',
                'resources/assets/mv/style.bundle.css',
                'resources/assets/css/datatables.bundle.css',
                // 'resources/assets/css/daterangepicker.css',
                
                // Logo & Icon
                'resources/assets/images/logo/logo.png',
                'resources/assets/images/logo/small-logo.png',
                'resources/assets/images/logo/favicon.ico',
            ],
            refresh: true,
        }),
    ],
});
