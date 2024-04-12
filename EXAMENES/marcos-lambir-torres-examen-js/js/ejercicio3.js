document.getElementById("btnLimpiar").addEventListener("click", function () {
  // Selecciona el formulario por su id y lo reset
  document.getElementById("formularioAvanzado").reset();
  // Opcional: Limpia cualquier mensaje de error visible
  const divErrores = document.getElementById("errores");

  if (divErrores) {
    divErrores.innerHTML = "";
    divErrores.style.display = "none";
    divErrores.style.visibility = "hidden"; // Oculta el div de errores
  }

  const inputs = document.querySelectorAll("input, select, textarea");
  inputs.forEach((e) => {
    //INTRODUCIR EL CÓDIGO NECESARIO
    // Opcional: Restablece el estilo de los campos del formulario
    e.style = "";
  });
});

document
  .getElementById("formularioAvanzado")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevenir el envío estándar del formulario

    try {
      const inputs = document.querySelectorAll("input, select, textarea");
      inputs.forEach((e) => {
        //INTRODUCIR EL CÓDIGO NECESARIO
        // para resetear el formato de todos los inputs
        e.value = "";
        /* const formInputs = Array.from(document.querySelectorAll("input"));
        formInputs.forEach((e) => (e.value = "")); */
      });

      // Validación de cada campo según los requisitos
      validarCampo("nombre", "El nombre es obligatorio");
      validarMayorEdad(
        "fechaNacimiento",
        "Debes ser mayor de edad para registrarte.",
      );
      validarTelefono("telefono", "El número de teléfono no es válido.");
      validarEmail("email", "El correo electrónico no es válido.");
      validarCampo("direccion", "La dirección es obligatoria");
      validarCampo("ciudad", "La ciudad es obligatoria");
      validarCampo("region", "La región es obligatoria");
      validarSeleccion("pais", "Seleccionar un país es obligatorio");
      validarURL("sitioWeb", "La URL del sitio web personal no es válida.");
      validarCheckbox("temas", "Seleccionar al menos una opción de temas");
      // validarCampo("intereses", "Los intereses son obligatorios");

      alert("Formulario enviado con éxito.");
      console.log("Formulario válido. Implementar envío del formulario.");
    } catch (error) {
      const divErrores = document.getElementById("errores");
      divErrores.innerHTML = `<p>${error.msg}</p>`;
      divErrores.style.display = "block"; // Muestra el div de errores
      divErrores.style.visibility = "visible"; // Muestra el div de errores
      /* error.elemento.style.borderColor = "red"; */
      error.element.focus();
    }
  });

function validarCampo(id, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const campo = document.getElementById(id);
  if (!campo.value) {
    throw { msg: mensajeError, element: campo };
  }
}

function validarEmail(id, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const email = document.getElementById(id);
  if (!email.value.match(/^[\w-.]+@([\w-]+.)+[\w-]{2,4}$/)) {
    throw {
      msg: mensajeError,
      element: email,
    };
  }
}

function validarSeleccion(id, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const country = document.getElementById(id);
  let searched = country.value;
  // `regExp()` es útil para crear una expresión regular y buscar cosas determinadas
  const myRegExp = new RegExp(searched, "gi");
  if (!country.value.match(myRegExp)) {
    throw {
      msg: mensajeError,
      element: country,
    };
  }
}

function validarCheckbox(nombre, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const checkbox = document.getElementById(nombre);
  let searched = checkbox.value;
  // `regExp()` es útil para crear una expresión regular y buscar cosas determinadas
  const myRegExp = new RegExp(searched, "gi");
  if (!checkbox.value.match(myRegExp)) {
    throw {
      msg: mensajeError,
      element: checkbox,
    };
  }
}

function validarTelefono(id, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const tel = document.getElementById(id);
  tel = Number(tel.value);
  if (tel < 9 || tel > 10 || !tel || isNaN(tel)) {
    throw {
      msg: mensajeError,
      element: tel,
    };
  }
}

function validarMayorEdad(id, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const age = document.getElementById(id);
  const arrAge = new Array();
  arrAge.push(age);
  console.log(age.value);
  if (age < 18 || age > 100 || !age || isNaN(age)) {
    throw {
      msg: mensajeError,
      element: age,
    };
  }
}

function validarURL(id, mensajeError) {
  //INTRODUCIR EL CÓDIGO NECESARIO
  const web = document.getElementById(id);
  if (
    !web.value ||
    !web.value.match(
      /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/,
    )
  ) {
    throw {
      msg: mensajeError,
      element: web,
    };
  }
}
