import { defineConfig } from 'vite';
import fullReload from 'vite-plugin-full-reload';

export default defineConfig({
  plugins: [fullReload(['src/public/*.php'])],
  server: {
    host: '0.0.0.0', // ← これが必須
    port: 5173,
    hmr: true,
  },
  build: {
    outDir: 'src/public/assets',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: [
        'src/resources/app.js',
        'src/resources/app.css',
      ],
    },
  },
});
