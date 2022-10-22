import reactRefresh from '@vitejs/plugin-react-refresh';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: ['resources/views/**'],
        }),
        reactRefresh(),
    ],
});


