import { defineConfig } from 'vite'
import { NodePackageImporter } from 'sass-embedded'
import liveReload from 'vite-plugin-live-reload'
import path from 'path'

const SITE_URL = 'https://nikogin.lndo.site' ?? "or your site"

export default defineConfig({
    base: './',
    plugins: [
        liveReload(['**/*.php']),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        open: SITE_URL,
        cors: { origin: '*', credentials: true },
    },
    build: {
        target: 'es2024',
        outDir: 'build',
        emptyOutDir: false,
        manifest: true,
        rollupOptions: {
            input: {
                'ts/app':   'resources/ts/app.ts',
                'scss/app': 'resources/scss/app.scss',
            },
            output: {
                entryFileNames: '[name].[hash].js',
                assetFileNames: '[name].[hash][extname]',
            },
        },
    },
    css: {
        postcss: 'postcss.config.cjs',
        devSourcemap: true,
        preprocessorOptions: {
            scss: {
                api: 'modern',
                importer: new NodePackageImporter(),
            },
        },
    },
    resolve: {
        alias: {
            '@ts':   path.resolve('./resources/ts'),
            '@scss': path.resolve('./resources/scss'),
        },
    },
})
