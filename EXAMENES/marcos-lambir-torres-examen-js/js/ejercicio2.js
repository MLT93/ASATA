// Variables necesarias
const myButtonSubmit = document.querySelector("button");
const divDay_HTML = document.getElementById("resultadoFechaCorrecta");
const divMonth_HTML = document.getElementById("resultadoBisiesto");
const divYear_HTML = document.getElementById("resultadoFechaCompleta");
const day = document.getElementById("dia");
const month = document.getElementById("mes");
const year = document.getElementById("anio");
const formInputs = Array.from(document.querySelectorAll("input"));
const form = document.getElementById("formFecha");

// Función para enviar el formulario
myButtonSubmit.onclick = function () {
  try {
    // Validación día
    if (day.value < 1 || day.value > 31 || !day.value || isNaN(day.value)) {
      throw {
        msg: "El día no es correcto",
        element: day,
      };
    }
    // Validación mes
    if (
      month.value < 1 ||
      month.value > 12 ||
      !month.value ||
      isNaN(month.value)
    ) {
      throw {
        msg: "El mes no es correcto",
        element: month,
      };
    }
    // Validación año y mensaje si es bisiesto
    if (
      year.value < 0 ||
      year.value > 9999 ||
      !year.value ||
      isNaN(year.value)
    ) {
      throw {
        msg: "El mes no es correcto",
        element: year,
      };
    }

    // Restablezco los valores erróneos al corregirlos
    console.log(formInputs);
    formInputs.forEach((element) => {
      element.style.borderColor = "";
      element.style.backgroundColor = "";
    });

    // Envío "pop up" para el envío del formulario
    alert("Formulario enviado correctamente");
  } catch (error) {
    // Mostrar errores en pantalla
    if (error.msg === "El día no es correcto") {
      divDay_HTML.innerHTML = `<p>${error.msg}</p>`;
    } else if (error.msg === "El mes no es correcto") {
      divMonth_HTML.innerHTML = `<p>${error.msg}</p>`;
    } else if (error.msg === "El mes no es correcto") {
      divYear_HTML.innerHTML = `<p>${error.msg}</p>`;
    }

    if (year % 400 === 0 || year % 100 === 0 || year % 4 === 0) {
      const bisiesto = document.createElement("span");
      bisiesto.innerText = `El año es bisiesto`;
      divYear_HTML.appendChild(bisiesto);
    }

    // Gestión del error visualmente con estilos
    error.element.style.borderColor = "red";
    error.element.style.backgroundColor = "tomato";
    error.element.focus();
    console.log(error);

    // Restablezco el formulario si no hay errores
    if (!error) {
      form.reset();
    }
  }
};
