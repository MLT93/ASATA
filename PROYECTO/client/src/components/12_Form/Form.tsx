// import styles from "./Form.module.scss";
import { ChangeEvent, useEffect, useRef, useState } from "react";
import { Button } from "../03_Button/Button";
import { Modal } from "../11_Modal/Modal";
import axios, { AxiosResponse } from "axios";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Form = (): JSX.Element => {
  //* URLs DE LAS PETICIONES */
  const URL_API = "http://localhost/ASATA/PROYECTO/server/pages/registro.php";

  //* GUARDAR VALORES DE LOS INPUTS. Se puede hacer con `useRef()` o con `useState` */
  const [user, setUser] = useState({
    username: "",
    email: "",
    password1: "",
    password2: "",
  });

  const handleInputOnChangeText = (evt: ChangeEvent<HTMLInputElement>) => {
    /**
     ** 1. evt.target es el elemento que ejecuta el evento y obtiene los valores de los inputs (por eso lo desestructuramos)
     ** 2. Desestructuro el objeto `evt.target`
     ** 3. `name` identifica el atributo name del input, `value` describe el valor actual, `type` es el tipo de input y `checked` es el valor booleano que adquieren los checkbox
     */
    const { name, value, type, checked } = evt.target;

    /**
     ** 1. Actualiza el estado del objeto de los inputs
     ** 2. Reemplaza solo el valor del input que ejecutó el evento (`[name]: value` o `[name]: checked`)
     ** 3. Sincroniza el estado del nuevo valor usando `setUser`
     */
    type === "checkbox"
      ? setUser({ ...user, [name]: checked })
      : setUser({ ...user, [name]: value });
  };

  //* DESHABILITAR BOTÓN SI NO ESTÁN LOS CAMPOS LLENOS */
  const [isDisabled, setIsDisabled] = useState(true);
  useEffect(() => {
    const areInputsFilled =
      user.username.trim() !== "" &&
      user.email.trim() !== "" &&
      user.password1.trim() !== "" &&
      user.password2.trim() !== "";

    setIsDisabled(!areInputsFilled);
  }, [user, setIsDisabled]);

  //* FOCUS SOBRE EL PRIMER INPUT DEL FORM Y RESET DE LOS CAMPOS ESCRITOS */
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
  const handleSubmitForm = (event: {
    target: EventTarget;
    preventDefault: () => void;
  }) => {
    /**
     ** 1. Impedimos que la página se vuelva a cargar una vez que apretamos el botón `Submit`
     */
    event.preventDefault();

    /**
     ** 1. Comprobamos que las passwords coincidan
     ** 2. Si coinciden, realizamos petición POST y usamos `user` con la Class FormData para enviar la información al servidor
     */
    let definitivePassword = "";
    let errMsg = "";
    user.password1 === user.password2
      ? (definitivePassword = user.password1)
      : (errMsg = "Las passwords no coinciden.");

    if (definitivePassword) {
      void (async (URL) => {
        const formData = new FormData();
        const credentials = {
          username: user.username,
          email: user.email,
          password: definitivePassword,
        };
        formData.set("credentials", JSON.stringify(credentials));

        console.log(credentials);
        try {
          const response: AxiosResponse = await axios.post(URL, credentials, {
            headers: {
              "Access-Control-Allow-Origin": "*",
              Authorization: "Basic Auth",
              "Content-Type": "application/json",
            },
          });
          console.log(response);
          // toast.success("Usuario registrado correctamente.");

          /**
           **  1. Agregando un nuevo amigo `newUser` al principio de la lista utilizando el método setAmigos.
           **  2. Utilizando la sintaxis de spread operator (...) para copiar los usuarios existentes y luego agregar el nuevo usuario al inicio.
           */
        } catch (error) {
          error instanceof Error
            ? console.error("Error al agregar usuario:", error.message)
            : console.error("Error desconocido");
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

  //* PARA EL MODAL */
  const [isModalVisible, setIsModalVisible] = useState<boolean>(false);

  return (
    <>
      {/* LAS FUNCIONES Y LOS VALORES SE PASAN TODOS SIN PARÉNTESIS Y SIN ARROW FUNCTIONS */}
      <form
        action="registro.php"
        method="post"
        target="_self"
        onSubmit={handleSubmitForm}>
        <label htmlFor="usernameID">Username</label>
        <input
          type="text"
          name="username"
          id="usernameID"
          ref={inputRef}
          onChange={handleInputOnChangeText}
          value={user.username}
          autoComplete=""
        />

        <label htmlFor="emailID">Email</label>
        <input
          type="text"
          name="email"
          id="emailID"
          onChange={handleInputOnChangeText}
          value={user.email}
          autoComplete=""
        />

        <label htmlFor="password1ID">Password</label>
        <input
          type="password"
          name="password1"
          id="password1ID"
          onChange={handleInputOnChangeText}
          value={user.password1}
          autoComplete=""
        />

        <label htmlFor="password2ID">Repeat Password</label>
        <input
          type="password"
          name="password2"
          id="password2ID"
          onChange={handleInputOnChangeText}
          value={user.password2}
          autoComplete=""
        />

        <button
          type="submit"
          name="registro"
          id="registroID"
          disabled={isDisabled}>
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

      <Button text={"REGISTER"} onClick={() => setIsModalVisible(true)} />
      {isModalVisible ? (
        <Modal setIsModalVisible={setIsModalVisible}>
          <h3>Registro</h3>
        </Modal>
      ) : null}
    </>
  );
};

export { Form };
