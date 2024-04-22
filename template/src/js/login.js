document.addEventListener("DOMContentLoaded", () => {
  const buttonSubmit = document.getElementById("buttonSubmit");

  buttonSubmit.onclick = function (e) {
    e.preventDefault();

    try {
      // VALIDACIONES
      /* Validación Nombre */
      const name = document.getElementById("nameID");
      if (!name.value) {
        throw { msg: "El nombre es obligatorio", element: name };
      }
      /* Validación Apellido */
      const surname = document.getElementById("lastNameID");
      if (!surname.value) {
        throw { msg: "El apellido es obligatorio", element: surname };
      }
      /* Validación Edad */
      const age = document.getElementById("ageID");
      const parsedAge = new Date(age.value).getFullYear();
      const currentAge = new Date().getFullYear();
      console.log(parsedAge);
      if (parsedAge > currentAge) {
        throw {
          msg: "El correo electrónico es obligatorio y debe tener una fecha válida",
          element: email,
        };
      }
      /* Validación Email */
      const email = document.getElementById("emailID");
      if (!email.value.match(/^[\w-.]+@([\w-]+.)+[\w-]{2,4}$/)) {
        throw {
          msg: "El correo electrónico es obligatorio y debe tener un formato válido",
          element: email,
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
      const password = document.getElementById("passwordID");
      if (!password.value || !regExpSearched.test(password.value)) {
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
    } catch (error) {
      console.error(error.msg);
      error.element.style.borderColor = "red";
      if (error.element.style.borderColor) {
        error.element.style.color = "white";
      }
      error.element.style.backgroundColor = "tomato";
      error.element.focus();
    }
  };
});
