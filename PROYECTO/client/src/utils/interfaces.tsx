// Interfaz para los datos del usuario
interface User {
  username: string;
  email: string;
  password1: string;
  password2: string;
}

// Interfaz para la respuesta del servidor
interface ApiResponse {
  success: boolean;
  message: string;
  data?: unknown; // Ajusta esto según la estructura de los datos específicos esperados
}

export type { User, ApiResponse };
