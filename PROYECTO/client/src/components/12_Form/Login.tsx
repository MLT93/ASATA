import axios from "axios";
import { ChangeEvent, useEffect, useRef, useState } from "react";

/* 
  1. CONECTAR PHP, REACT VITE Y MYSQL
  2. PRIMERA PARTE: https://www.youtube.com/watch?v=Gu-Fl1zIVbE
  3. SEGUNDA PARTE: https://www.youtube.com/watch?v=4B2XJHFaFIc
  4. MOVER BUILD FILES AL SERVIDOR PHP: https://www.techstackk.com/programming/reactjs/xampp-reactjs?pid=523
*/

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {ReactNode} props.children - Este componente acepta el anidamiento de contenido, utilizando dos etiquetas `<Modal></Modal>`
 * @param {(isVisible: boolean) => void} props.setIsModalVisible Función para asignar la visibilidad del Modal
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Login = (): JSX.Element => {
  // useState, FormData y Fetch
  const [user, setUser] = useState({ email: "", password: "" });

  const handleInputOnChangeText = (evt: ChangeEvent<HTMLInputElement>) => {
    const { name, value, type, checked } = evt.target;
    type === "checkbox"
      ? setUser({ ...user, [name]: checked })
      : setUser({ ...user, [name]: value });
  };

  const [isDisabled, setIsDisabled] = useState(true);
  useEffect(() => {
    const isFilled = user.email.trim() !== "" && user.password.trim() !== "";
    setIsDisabled(!isFilled);
  }, [user, setIsDisabled]);

  const inputRef = useRef<HTMLInputElement>(null);
  useEffect(() => {
    inputRef.current?.focus();
  }, []);

  const handleResetForm = () => {
    setUser({ email: "", password: "" });
    inputRef.current?.focus();
  };

  // ************************ GET ***************************

  // const URL_BASE = "http://localhost:80/server";
  const URL_GET = "/api/DB/DB.php";

  const [data, setData] = useState<Response>();
  const [error, setError] = useState<Error>();
  const [isLoading, setIsLoading] = useState<boolean>(false);

  useEffect(() => {
    void (async (url: string): Promise<void> => {
      try {
        setIsLoading(true);
        const response = await axios.get(url);
        if (!response) {
          throw new Error("Error en la petición");
        }
        const result = (await response.data) as Response;
        setData(result);
      } catch (error) {
        if (error instanceof Error) {
          console.error("Error obtenido:", error.message);
          setError(error);
        } else {
          console.error("Error desconocido");
        }
      } finally {
        setIsLoading(false);
      }
    })(URL_GET);
  }, []);

  console.log(data);
  error ? console.log(error) : null;
  isLoading ? console.log(isLoading) : null;

  // ************************ GET ***************************

  // const URL_BASE = "http://localhost:80/server";
  const URL_GET_USUARIOS = "/api/users/users.php";

  const [data2, setData2] = useState<Response>();
  const [error2, setError2] = useState<Error>();
  const [isLoading2, setIsLoading2] = useState<boolean>(false);

  useEffect(() => {
    void (async (url: string): Promise<void> => {
      try {
        setIsLoading2(true);
        const response = await axios.get(url);
        if (!response) {
          throw new Error("Error en la petición");
        }
        const result = (await response.data) as Response;
        setData2(result);
      } catch (error) {
        if (error instanceof Error) {
          console.error("Error obtenido:", error.message);
          setError2(error);
        } else {
          console.error("Error desconocido");
        }
      } finally {
        setIsLoading2(false);
      }
    })(URL_GET_USUARIOS);
  }, []);

  console.log(data2);
  error ? console.log(error2) : null;
  isLoading ? console.log(isLoading2) : null;

  // *********************** POST ***************************

  const handleSubmitForm = (event: { preventDefault: () => void }) => {
    event.preventDefault();

    const URL_POST_LOGIN = "/api/indexito.php";

    console.log(user);

    void (async (url) => {
      try {
        const res = await axios.post(url, JSON.stringify(user), {
          headers: {
            "Content-Type": "application/json",
          },
        });
        const axiosData = res.data as Response;
        console.log(axiosData);

        if (!res) {
          console.error("Login Failed:", res);
        } else {
          const data = (await res.data) as Response;
          console.log(data);
          // toast.success("Response recibido!");
        }
      } catch (error) {
        if (error instanceof Error) {
          console.error("Thrawed Error:", error.message);
        } else {
          console.error("Unknown Error");
        }
      }
    })(URL_POST_LOGIN);
  };

  return (
    <>
      <form onSubmit={handleSubmitForm}>
        <label htmlFor="emailID">Email</label>
        <input
          type="text"
          name="email"
          id="emailID"
          ref={inputRef}
          onChange={handleInputOnChangeText}
          value={user.email}
          autoComplete="off"
        />

        <label htmlFor="passwordID">Password</label>
        <input
          type="password"
          name="password"
          id="passwordID"
          onChange={handleInputOnChangeText}
          value={user.password}
          autoComplete="off"
        />

        <button type="submit" name="login" id="loginID" disabled={isDisabled}>
          SEND
        </button>

        <button
          type="reset"
          name="reset"
          id="resetID"
          onClick={handleResetForm}>
          RESET
        </button>
      </form>
    </>
  );
};

export { Login };
