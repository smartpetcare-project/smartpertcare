import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs-extra';

const folder = {
    src: "resources/", // source files
    src_assets: "resources/", // source assets files
    dist: "public/", // build files
    dist_assets: "public/build/" //build assets files
};

export default defineConfig({
    build: {
        manifest: true,
        rtl: true,
        outDir: 'public/build/',
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: (css) => {
                    if (css.name.split('.').pop() == 'css') {
                        return 'css/' + `[name]` + '.css';
                    } else {
                        return 'icons/' + css.name;
                    }
                },
                entryFileNames: 'js/' + `[name]` + `.js`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/main.scss',
                'resources/sass/blue-theme.scss',
                'resources/sass/bordered-theme.scss',
                'resources/sass/dark-theme.scss',
                'resources/sass/responsive.scss',
                'resources/sass/semi-dark.scss',
            ],
            refresh: true,
        }),
        {
            name: 'copy-assets',
            async writeBundle() {
                try {
                    // Copy images, json, fonts, and js
                    await Promise.all([
                        fs.copy(folder.src_assets + 'images', folder.dist_assets + 'images'),
                        fs.copy(folder.src_assets + 'fonts', folder.dist_assets + 'fonts'),
                        fs.copy(folder.src_assets + 'js', folder.dist_assets + 'js'),
                        fs.copy(folder.src_assets + 'css', folder.dist_assets + 'css'),
                        fs.copy(folder.src_assets + 'plugins', folder.dist_assets + 'plugins'),
                    ]);
                } catch (error) {
                    console.error('Error copying assets:', error);
                }
            },
        },
    ],
});
