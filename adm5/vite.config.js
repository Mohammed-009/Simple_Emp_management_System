import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
// import { defineConfig } from 'vite';
// import vue from '@vitejs/plugin-vue';
// import path from 'path';

// export default defineConfig({
//   plugins: [vue()],
//   build: {
//     rollupOptions: {
//       input: {
//         main: path.resolve(__dirname, 'resources/sass/app.scss'),
//       },
//     },
//   },
//   css: {
//     preprocessorOptions: {
//       scss: {
//         additionalData: `@import "resources/sass/_variables.scss";`, // Adjust the path as needed
//       },
//     },
//   },
// });

