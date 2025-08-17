import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/css/app.css',
//                 'resources/js/app.js',
//             ],
//             refresh: true,
//         }),
//     ],
// });

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // يسمح بالاتصال من أي جهاز على الشبكة
        port: 5173,      // المنفذ الافتراضي لـ Vite، يمكنك تغييره
        hmr: {
            host: '21.21.144.207', // ضع هنا IP جهازك من ipconfig
        },
    },
});
