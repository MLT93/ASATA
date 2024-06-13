- [**Explicación de 13_all**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Explicación video de 13_all**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Explicación video para conectar PHP con React**](https://www.youtube.com/watch?v=OC9_B0bPku8)

- [**Explicación de Formularios en React**](https://www.escuelafrontend.com/formularios-en-react)

- **Ejemplo de Uncontrolled Form React:**

import React from "react";

function Form() {
  const [values, setValues] = React.useState({
    email: "",
    password: "",
  });

  function handleSubmit(evt) {
    /*
      Previene el comportamiento default de los
      formularios el cual recarga el sitio
    */
    evt.preventDefault();

    // Aquí puedes usar values para enviar la información
  }

  function handleChange(evt) {
    /*
      evt.target es el elemento que ejecuto el evento
      name identifica el input y value describe el valor actual
    */
    const { target } = evt;
    const { name, value } = target;

    /*
      Este snippet:
      1. Clona el estado actual
      2. Reemplaza solo el valor del
         input que ejecutó el evento
    */
    const newValues = {
      ...values,
      [name]: value,
    };

    // Sincroniza el estado de nuevo
    setValues(newValues);
  }

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="email">Email</label>
      <input
        id="email"
        name="email"
        type="email"
        value={values.email}
        onChange={handleChange}
      />
      <label htmlFor="password">Password</label>
      <input
        id="password"
        name="password"
        type="password"
        value={values.password}
        onChange={handleChange}
      />
      <button type="submit">Sign Up</button>
    </form>
  );
}

- **Ejemplo de Controlled Form React:**

import React from "react";

function Form() {
  const formRef = React.useRef();

  function handleSubmit(evt) {
    evt.preventDefault();
    /*
        1. Usamos FormData para obtener la información
        2. FormData requiere la referencia del DOM,
           gracias al REF API podemos pasar esa referencia
        3. Finalmente obtenemos los datos serializados
      */
    const formData = new FormData(formRef.current);
    const values = Object.fromEntries(formData);

    // Aquí puedes usar values para enviar la información
  }

  return (
    <form onSubmit={handleSubmit} ref={formRef}>
      <label htmlFor="email">Email</label>
      <input id="email" name="email" type="email" />
      <label htmlFor="password">Password</label>
      <input id="password" name="password" type="password" />
      <button type="submit">Submit</button>
    </form>
  );
}

- **Validación de Form React:**

import React from "react";

const emailRegexp = new RegExp(/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/);

function Form() {
  const [emailField, setEmailField] = React.useState({
    value: "",
    hasError: false,
  });

  function handleChange(evt) {
    /*
      Esta función es la misma usada
      en la sección de componentes de
      Componentes Controlados
    */
  }

  function handleBlur() {
    /*
      1. Evaluamos de manera síncrona
      si el valor del campo no es un correo valido.

      2. Recordar que este método se llama
      cada vez que abandonamos el campo y evita
      que el usuario reciba un error sin haber terminado
      de poner el valor.
    */

    const hasError = !emailRegexp.test(emailField.value);
    setEmailField((prevState) => ({ ...prevState, hasError }));
  }

  return (
    <form>
      <label htmlFor="email">Email</label>
      <input
        id="email"
        name="email"
        value={emailField.value}
        onChange={handleChange}
				{/* onChange para sincronizar el valor del campo */}
        onBlur={handleBlur} 
				{/* onBlur para sincronizar la validación del campo */}
        aria-errormessage="emailErrorID"
        aria-invalid={emailField.hasError}
      />
      {/*
          1. Solo muestra el mensaje de error cuando hasError sea true
          2. Crea una relación lógica entre el campo y el mensaje de error,
          favoreciendo la semántica y la accesibilidad del campo.
        */}
      <p
        id="msgID"
        aria-live="assertive"
        style={{ visibility: emailField.hasError ? "visible" : "hidden" }}
      >
        Please enter a valid email
      </p>
    </form>
  );
}
