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
        // Optimasi chunk splitting
        rollupOptions: {
            output: {
                // Pisahkan vendor library (Alpine) ke chunk terpisah agar bisa di-cache browser
                manualChunks: {
                    alpine: ['alpinejs'],
                },
                // Nama file dengan hash untuk long-term caching
                entryFileNames: 'assets/[name]-[hash].js',
                chunkFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash].[ext]',
            },
        },
        // Kurangi ukuran CSS
        cssMinify: true,
        // Warn jika chunk > 500kb
        chunkSizeWarningLimit: 500,
        // Source map hanya di dev
        sourcemap: false,
    },
});
