import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        // Minify dengan terser untuk output lebih kecil
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,    // hapus console.log di production
                drop_debugger: true,
                pure_funcs: ['console.log', 'console.info', 'console.debug'],
            },
        },
        // Optimasi chunk splitting (di-handle otomatis oleh Vite/Rolldown)
        // Kurangi ukuran CSS
        cssMinify: true,
        // Warn jika chunk > 500kb
        chunkSizeWarningLimit: 500,
        // Source map hanya di dev
        sourcemap: false,
    },
});
