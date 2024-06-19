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
        target: "http://localhost:80/ASATA/PROYECTO/server", // URL del backend PHP
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, "/credentials"), // Reescritura de `/api` por `/credentials` (la carpeta donde está el archivo `registro.php`)
      },
    },
  },
});
