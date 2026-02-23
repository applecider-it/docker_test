import { defineConfig } from "vite";
import fullReload from "vite-plugin-full-reload";
import react from "@vitejs/plugin-react";
import vue from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
  plugins: [fullReload(["resources/views/**/*.php"]), react(), vue()],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./resources/js"),
    },
  },
  server: {
    host: "0.0.0.0", // ← これが必須
    port: 5173,
    hmr: true,
  },
  build: {
    outDir: "public/assets",
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: [
        "resources/js/entrypoints/app.ts",
        "resources/js/entrypoints/javascript-test.ts",
        "resources/js/entrypoints/dummy.ts",

        "resources/css/app.css",
      ],
    },
  },
});
