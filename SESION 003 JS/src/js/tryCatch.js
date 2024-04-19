const validationButton = document.getElementById("validationButton");

validationButton.onclick = function () {
  try {
    // VALIDACIONES
    /* Validación Nombre */
    const name = document.getElementById("name");
    if (!name.value) {
      throw { msg: "El nombre es obligatorio", element: name };
    }
    /* Validación Apellido */
    const surname = document.getElementById("surname");
    if (!surname.value) {
      throw { msg: "El apellido es obligatorio", element: surname };
    }
    /* Validación Email */
    const email = document.getElementById("email");
    if (!email.value.match(/^[\w-.]+@([\w-]+.)+[\w-]{2,4}$/)) {
      throw {
        msg: "El correo electrónico es obligatorio y debe tener un formato válido",
        element: email,
      };
    }
    /* Validación Edad */
    const age = document.getElementById("age");
    if (age.value < 18 || age.value > 100 || !age.value || isNaN(age.value)) {
      throw {
        msg: "Es obligatorio ser mayor de edad para registrarse y menor de 100",
        element: age,
      };
    }
    /* Validación Web */
    const web = document.getElementById("web");
    if (
      !web.value ||
      !web.value.match(
        /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/
      )
    ) {
      throw {
        msg: "La URL de la página web no es correcta",
        element: web,
      };
    }
    /* Validación Código Postal */
    const postalCode = document.getElementById("postalCode");
    if (!postalCode.value || isNaN(postalCode.value)) {
      throw {
        msg: "El código postal es obligatorio",
        element: postalCode,
      };
    }
    /* Validación de Password */
    /**
     * * | INPUT ||         CONDITION        |
     * * password.value.match(regExpSearched);
     *
     * * |     CONDITION      ||    INPUT    |
     * * !regExpSearched.test(password.value);
     */
    const regExpSearched = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
    const password = document.getElementById("password");
    if (!password.value || password.value.match(regExpSearched)) {
      throw { msg: "La contraseña no es correcta", element: password };
    }

    // RESTABLECER EL FORMATO DE ERRORES
    /* Al lanzar `throw` un error, el input quedará en rojo aunque le pongamos el valor requerido */
    /* Para evitar eso, seleccionamos todos los `input` del formulario y modificamos ese comportamiento */
    /* Usamos `forEach` porque `querySelectorAll` devuelve un array de elementos */
    const formInputs = Array.from(document.querySelectorAll("input"));
    formInputs.forEach((e) => {
      e.style.borderColor = "";
      e.style.backgroundColor = "";
    });

    alert("Formulario enviado con éxito!");
    // ToDo: revisar esta linea de abajo
    // document.getElementById("errors").innerHTML = "";
  } catch (error) {
    document.getElementById("errors").innerHTML = `<p>${error.msg}</p>`;
    error.element.style.borderColor = "red";
    error.element.style.backgroundColor = "tomato";
    error.element.focus();
  }
};
