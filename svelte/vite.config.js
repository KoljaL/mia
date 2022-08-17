import { defineConfig } from 'vite';
import { svelte } from '@sveltejs/vite-plugin-svelte';

export default defineConfig({
    plugins: [svelte({
        // purge: ["./index.html", './src/**/*.{svelte,js,ts}']
        // preprocess: [svelte_preprocess()],
    })],
});