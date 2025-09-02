import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import fs from "fs";
import path from "path";
// import { fileURLToPath, URL } from "node:url";
import oxlintPlugin from "vite-plugin-oxlint";

// console.log(path.resolve(__dirname, "/public"));
// console.log(import.meta.env.VITE_API_URL);
// console.log(env.VITE_API_URL);
// console.log(process.env.VITE_API_URL);

// https://vite.dev/config/
export default defineConfig({
  server: {
    host: "0.0.0.0",
    port: parseInt(process.env.VITE_PORT) || 5173,
    https: {
      key: fs.readFileSync("../nginx/ssl/skills2025.local.key"),
      cert: fs.readFileSync("../nginx/ssl/skills2025.local.crt"),
    },
  },

  plugins: [vue(), oxlintPlugin()],

  root: path.resolve(__dirname, "src"), // Répertoire de base pour les sources

  build: {
    outDir: "./../public",
    emptyOutDir: true,
  },

  resolve: {
    alias: {
      // "@": fileURLToPath(new URL("./src", import.meta.url)),
      // "@": "./src",
      // "@css": fileURLToPath(new URL("./src/assets/scss", import.meta.url)),
      // "@js": fileURLToPath(new URL("./src/assets/js", import.meta.url)),
      "@js": path.resolve(__dirname, "src/assets/js"),
      "@css": path.resolve(__dirname, "src/assets/scss"),
      // "@": path.resolve(__dirname, "src"),
    },
  },
});

// server: {
// https: true, // Activer HTTPS en local
// host: "0.0.0.0",
// strictPort: true,
// port: 3000,
// hmr: true, // Hot Module Replacement activé
// },
// resolve: {
//   alias: {
//     "@": fileURLToPath(new URL("./src", import.meta.url)),
//   },
// },
// define: {
// "process.env": {},
// "process.env.VITE_API_URL": JSON.stringify("https://api.skills2025.local"),
// vueDevTools: process.env.NODE_ENV === "development" ? true : false,
// },
// esbuild: {
//   target: "esnext",
//   platform: "linux",
// },
// css: {
//   preprocessorOptions: {
//     scss: {
//       additionalData: `@use "@/assets/scss/styles.scss" as *;`,
//     },
//   },
// },
// root: "src",
// build: {
//   outDir: path.resolve(__dirname, "public"), // Répertoire de sortie pour le build
//   emptyOutDir: true, // also necessary
// },
/*
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `
          @import "./src/styles/_animations.scss";
        `
      }
    }
  }
  */
