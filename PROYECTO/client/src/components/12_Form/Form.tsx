// import styles from "./Form.module.scss";
import { ChangeEvent, useEffect, useRef, useState } from "react";
import { Button } from "../03_Button/Button";
import { Modal } from "../11_Modal/Modal";
// import { fetchDataPOST } from "../../utils/fetchData";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Form = (): JSX.Element => {
  /* GUARDAR VALOR DE LOS INPUTS. Se puede hacer con `useRef()` o con `useState` */
  const [user, setUser] = useState({
    username: "",
    email: "",
    password1: "",
    password2: "",
  });

  /* ENVÍO DEL FORM */
  const handleSubmitForm = (event: {
    target: EventTarget;
    preventDefault: () => void;
  }) => {
    /* impedimos que la página se vuelva a cargar una vez que apretamos el botón `Submit` */
    event.preventDefault();

    /* Aquí puedes usar `user` para enviar la información */
    console.log(user);
  };

  const handleInputOnChangeText = (evt: ChangeEvent<HTMLInputElement>) => {
    /*
      1. evt.target es el elemento que ejecuta el evento y obtiene los valores de los inputs (por eso lo desestructuramos)
      2. `name` identifica el atributo name del input, `value` describe el valor actual, `type` es el tipo de input y `checked` es el valor booleano que adquieren los checkbox
    */
    const { name, value, type, checked } = evt.target;

    /*
      1. Clona el estado actual
      2. Reemplaza solo el valor del
         input que ejecutó el evento
      3. Sincroniza el estado del nuevo valor con `setUser`
    */
    type === "checkbox"
      ? setUser({ ...user, [name]: checked })
      : setUser({ ...user, [name]: value });
  };

  /* DESHABILITAR BOTÓN SI NO ESTÁN LOS CAMPOS LLENOS */
  const [isDisabled, setIsDisabled] = useState(true);
  useEffect(() => {
    const areInputsFilled =
      user.username.trim() !== "" &&
      user.email.trim() !== "" &&
      user.password1.trim() !== "" &&
      user.password2.trim() !== "";

    setIsDisabled(!areInputsFilled);
  }, [user, setIsDisabled]);

  /* LLAMADA A LA API */
  // const URL = "http://localhost/ASATA/PROYECTO/server/pages/registro.php";

  // const [isPending, setIsPending] = useState(false);
  // const [data, setData] = useState(null);
  // const [error, setError] = useState(null);

  // useEffect(() => {
  //   return void fetchDataPOST(URL, newData);
  // }, [URL, newData]);

  /* FOCUS SOBRE EL PRIMER INPUT DEL FORM Y RESET DE LOS CAMPOS ESCRITOS */
  const inputRef = useRef<HTMLInputElement>(null);
  useEffect(() => {
    inputRef.current?.focus();
  }, []);

  const handleResetForm = () => {
    setUser({ username: "", email: "", password1: "", password2: "" });
    inputRef.current?.focus();
  };

  /* MANEJO DE ERRORES */
  // Username: /[A-Za-z]+/
  // Password: /^(?=.*\d)(?=(.*\W))(?=.*[a-zA-Z])(?!.*\s).{8,16}$/
  // Email: /[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/

  /* PARA EL MODAL */
  const [isModalVisible, setIsModalVisible] = useState<boolean>(false);

  return (
    <>
      {/* LAS FUNCIONES Y LOS VALORES SE PASAN TODOS SIN PARÉNTESIS Y SIN ARROW FUNCTIONS */}
      <form
        action="registro.php"
        method="post"
        target="_self"
        onSubmit={handleSubmitForm}>
        <fieldset>
          <legend>SIGN UP</legend>
          <label htmlFor="usernameID">Username</label>
          <input
            type="text"
            name="username"
            id="usernameID"
            ref={inputRef}
            value={user.username}
            onChange={handleInputOnChangeText}
          />

          <label htmlFor="emailID">Email</label>
          <input
            type="text"
            name="email"
            id="emailID"
            value={user.email}
            onChange={handleInputOnChangeText}
          />

          <label htmlFor="password1ID">Password</label>
          <input
            type="password"
            name="password1"
            id="password1ID"
            value={user.password1}
            onChange={handleInputOnChangeText}
          />

          <label htmlFor="password2ID">Repeat Password</label>
          <input
            type="password"
            name="password2"
            id="password2ID"
            value={user.password2}
            onChange={handleInputOnChangeText}
          />
        </fieldset>

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
