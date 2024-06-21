import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

export default defineConfig({
  plugins: [react()],
  build: {
    target: "esnext",
  },
  server: {
    proxy: {
      // Las peticiones ahora deben empezar todas por `/api` para que la encuentre
      "/api": {
        target: "http://localhost:80/server", // URL Base del backend PHP
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ""), // Reescritura de `/api/DB/DB.php` por `/DB/DB.php` (la carpeta donde está el archivo en el servidor)
      },
    },
  },
});
