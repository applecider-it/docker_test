import { defineConfig } from "vite";
import fullReload from "vite-plugin-full-reload";
import react from "@vitejs/plugin-react";

export default defineConfig({
  plugins: [fullReload(["public/*.php"]), react()],
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
      input: ["resources/app.ts", "resources/app.css"],
    },
  },
});
