// import styles from "./Form.module.scss";
import { ChangeEvent, FormEvent, useEffect, useRef, useState } from "react";
import { User } from "../../utils/interfaces";
// import axios, {AxiosResponse} from "axios";
// import axios from "axios";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Register = (): JSX.Element => {
  //* URLs DE LAS PETICIONES */
  // const URL_API = "https://cors-anywhere.herokuapp.com/http://localhost/ASATA/PROYECTO/server/api/registro.php";
  const URL_API = "/api/registro.php";

  //* GUARDAR VALORES DE LOS INPUTS. Se puede hacer con `useRef()` (para evitar tantos renderizados del componente) o con `useState` (forma más antigua) */
  const [user, setUser] = useState<User>({
    username: "",
    email: "",
    password1: "",
    password2: "",
  });

  const handleInputOnChangeText = (evt: ChangeEvent<HTMLInputElement>) => {
    /**
     ** 1. evt.target es el elemento que ejecuta el evento y obtiene los valores de los inputs (por eso lo desestructuramos)
     ** 2. Desestructuro el objeto `evt.target` para poder manejar más comodamente los valores
     ** 3. `name` identifica el atributo (name) del input
     ** 4. `value` describe el valor que recibe el input
     ** 5. `type` es el tipo de input (text, number, checkbox, radio)
     ** 6. `checked` es el valor booleano que adquieren los checkbox
     */
    const { name, value, type, checked } = evt.target;

    /**
     ** 1. Actualiza el estado del objeto de los inputs
     ** 2. Reemplaza solo el valor del input que ejecutó el evento (`[name]: value` o `[name]: checked`)
     ** 3. Sincroniza el estado del nuevo valor usando `setUser`
     */
    type === "checkbox" ? setUser({ ...user, [name]: checked }) : setUser({ ...user, [name]: value });
  };

  //* DESHABILITAR BOTÓN SI NO ESTÁN LOS CAMPOS LLENOS */
  const [isDisabled, setIsDisabled] = useState<boolean>(true);
  useEffect(() => {
    const areInputsFilled =
      user.username.trim() !== "" &&
      user.email.trim() !== "" &&
      user.password1.trim() !== "" &&
      user.password2.trim() !== "";

    setIsDisabled(!areInputsFilled);
  }, [user, setIsDisabled]);

  //* FOCUS SOBRE EL PRIMER INPUT DEL FORM Y RESET DE LOS CAMPOS ESCRITOS */
  /**
   ** 1. Esto es válido si trabajamos el formulario con `useState()`
   ** 2. También se puede conseguir el mismo efecto con `autoFocus` (atributo de HTML) directamente en el input deseado
   */
  const inputRef = useRef<HTMLInputElement>(null);
  useEffect(() => {
    inputRef.current?.focus();
  }, []);

  const handleResetForm = () => {
    setUser({ username: "", email: "", password1: "", password2: "" });
    inputRef.current?.focus();
  };

  //* MANEJO DE ERRORES */
  // Username: /[A-Za-z]+/
  // Password: /^(?=.*\d)(?=(.*\W))(?=.*[a-zA-Z])(?!.*\s).{8,16}$/
  // Email: /[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/

  //* PETICIÓN API (POST) ENVIAMOS LA INFORMACIÓN DEL FORM AL SERVIDOR */
  const handleSubmitForm = (event: FormEvent<HTMLFormElement>) => {
    /**
     ** 1. Comprobamos que las passwords coincidan
     ** 2. Si coinciden, realizamos petición HTTP y usamos `user` con el objeto `formData` para enviar la información al servidor
     */
    let definitivePassword = "";
    let errMsg = "";
    user.password1 === user.password2
      ? (definitivePassword = user.password1)
      : (errMsg = "Las passwords no coinciden.");

    if (definitivePassword) {
      /**
       ** 1. Impedimos que la página se vuelva a cargar una vez que apretamos el botón `Submit`
       */
      event.preventDefault();

      /**
       ** 1. Creamos un objeto de pares clave/valor que representa los datos de un formulario HTML con la class FormData
       ** 2. Permite construir fácilmente un conjunto de datos que luego se puede enviar a través de una solicitud HTTP
       ** 3. Utilizamos el método `append` porque asigna nuevos valores al objeto de forma dinámica
       ** 4. Recuerda que el primer parámetro de este método son los atributos `name=""` de los inputs
       */
      const formData = new FormData();
      const credentials = {
        username: user.username,
        email: user.email,
        password: definitivePassword,
      };
      formData.append("credentials", JSON.stringify(credentials));

      void (async (URL) => {
        try {
          // const config = {
          //   baseURL: URL,
          //   // `timeout` especifica el número de milisegundos antes que la petición expire.
          //   url: "/registro.php",
          //   method: "POST",
          //   headers: {
          //     "Content-Type": " application/json; charset=UTF-8",
          //     "Access-Control-Allow-Origin": "*",
          //     "Access-Control-Allow-Headers": "*",
          //     "Access-Control-Allow-Credentials": "true",
          //     "Access-Control-Allow-Methods":
          //       "GET, POST, PUT, PATCH, DELETE, OPTIONS",
          //     Allow: " GET, POST, PUT, PATCH, DELETE, OPTIONS",
          //     // Authorization: "Basic QWRtaW46MTIzNA==",
          //     email: "admin@mail.com",
          //     "X-Requested-With": "XMLHttpRequest",
          //   },
          //   // `auth` indica que HTTP Basic auth debe ser usado, y proveer credenciales.
          //   // Esto establecerá una cabecera `Authorization`, sobrescribiendo cualquier cabecera personalizada
          //   // existente `Authorization`, previamente a través de `headers`.
          //   // Ten en cuenta que solo HTTP Basic auth es configurable a través de este parámetro.
          //   // Para tokens Bearer y otros, usa la cabecera personalizada `Authorization` en su lugar.
          //   auth: {
          //     username: "Admin",
          //     password: "1234",
          //   },
          //   data: credentials,
          //   timeout: 10000,
          // };
          // console.log(config);
          // console.log(config.data);
          // await axios(config);
          // // console.log(response);

          const options: RequestInit = {
            method: "POST",
            headers: {
              "Content-Type": "multipart/form-data",
              Accept: "*/*",
              email: "admin@mail.com",
              Authorization: "Basic QWRtaW46MTIzNA==",
            },
            body: formData,
            redirect: "follow",
          };

          const response: Response = await fetch(URL, options);

          console.log(response);

          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }

          // toast.success("Usuario registrado correctamente.");
        } catch (error) {
          if (error instanceof Error) {
            console.error("Error obtenido:", error.message);
            console.log(error.message);
          } else {
            console.error("Error desconocido");
          }
        }
      })(URL_API);
    } else {
      console.error(`${errMsg}`);
    }
  };

  //* PETICIÓN API (GET) RECIBIMOS LA INFORMACIÓN PROCESADA DEL SERVIDOR */
  // const [isPending, setIsPending] = useState(false);
  // const [data, setData] = useState(null);
  // const [error, setError] = useState(null);
  // useEffect(() => {
  //   void (async (URL) => {
  //     try {
  //       const response: AxiosResponse | ResponseType = await axios.get(URL, {
  //         headers: {
  //           Authorization: "Basic ",
  //           "Content-Type": "application/json",
  //         },
  //       });

  //       console.log(response);
  //     } catch (error) {
  //       error instanceof Error
  //         ? console.error("Error al recibir la respuesta:", error.message)
  //         : console.error("Error desconocido");
  //     }
  //   })(URL_API);
  // }, []);

  return (
    <>
      {/* LAS FUNCIONES Y LOS VALORES SE PASAN TODOS SIN PARÉNTESIS Y SIN ARROW FUNCTIONS */}
      <form action="registro.php" method="post" target="_self" onSubmit={handleSubmitForm}>
        <label htmlFor="usernameID">Username</label>
        <input
          type="text"
          name="username"
          id=""
          ref={inputRef}
          autoFocus
          value={user.username}
          onChange={handleInputOnChangeText}
          autoComplete=""
        />

        <label htmlFor="emailID">Email</label>
        <input
          type="text"
          name="email"
          id=""
          value={user.email}
          onChange={handleInputOnChangeText}
          autoComplete=""
        />

        <label htmlFor="password1ID">Password</label>
        <input
          type="password"
          name="password1"
          id=""
          value={user.password1}
          onChange={handleInputOnChangeText}
          autoComplete=""
        />

        <label htmlFor="password2ID">Repeat Password</label>
        <input
          type="password"
          name="password2"
          id=""
          value={user.password2}
          onChange={handleInputOnChangeText}
          autoComplete=""
        />

        <button type="submit" name="registro" id="" disabled={isDisabled}>
          SEND
        </button>

        <button type="reset" name="reset" id="" onClick={handleResetForm}>
          RESET
        </button>
      </form>
    </>
  );
};

export { Register };
