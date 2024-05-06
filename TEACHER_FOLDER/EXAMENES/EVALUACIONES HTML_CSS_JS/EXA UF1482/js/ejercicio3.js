document.getElementById('btnLimpiar').addEventListener('click', function() {
 // Selecciona el formulario por su id y lo resetea
 document.getElementById('formularioAvanzado').reset();
 // Opcional: Limpia cualquier mensaje de error visible
 const divErrores = document.getElementById("errores");
 if (divErrores) {
  divErrores.innerHTML = "";
  divErrores.style.display = "none";
  divErrores.style.visibility = "hidden"; // Oculta el div de errores
 }

 // Opcional: Restablece el estilo de los campos del formulario
 const inputs = document.querySelectorAll('input, select, textarea');
 inputs.forEach(input => {
     input.style.borderColor = "";
     input.style.backgroundColor = "";
 });
});

document.getElementById('formularioAvanzado').addEventListener('submit', function(event) {
 event.preventDefault(); // Prevenir el envío estándar del formulario

 try {
     // Reseteando el formato de todos los inputs
     const inputs = document.querySelectorAll('input, select, textarea');
     inputs.forEach(input => {
         input.style.borderColor = "";
         input.style.backgroundColor = "";
     });

     // Validación de cada campo según los requisitos
     validarCampo('nombre', "El nombre es obligatorio");
     validarMayorEdad('fechaNacimiento', "Debes ser mayor de edad para registrarte.");
     validarTelefono('telefono', "El número de teléfono no es válido.");

     validarEmail('email', "El correo electrónico no es válido.");
     validarCampo('direccion', "La dirección es obligatoria");
     validarCampo('ciudad', "La ciudad es obligatoria");
     validarCampo('region', "La región es obligatoria");
     validarSeleccion('pais', "Seleccionar un país es obligatorio");

     validarURL('sitioWeb', "La URL del sitio web personal no es válida.");
     validarCheckbox('temas', "Seleccionar al menos una opción de temas es obligatorio");

     alert("Formulario enviado con éxito.");
     console.log("Formulario válido. Implementar envío del formulario.");

 } catch (error) {
     const divErrores = document.getElementById("errores");
     divErrores.innerHTML = `<p>${error.msj}</p>`;
     divErrores.style.display = "block"; // Muestra el div de errores
     divErrores.style.visibility = "visible"; // Muestra el div de errores
     error.elemento.style.borderColor = "red";
     error.elemento.focus();
 }
});

function validarCampo(id, mensaje) {
 const campo = document.getElementById(id);
 if (!campo.value.trim()) throw { msj: mensaje, elemento: campo };
}

function validarEmail(id, mensaje) {
 const email = document.getElementById(id);
 const patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
 if (!patron.test(email.value)) throw { msj: mensaje, elemento: email };
}

function validarSeleccion(id, mensaje) {
 const campo = document.getElementById(id);
 if (campo.value === "") throw { msj: mensaje, elemento: campo };
}

function validarCheckbox(nombre, mensaje) {
 const checkboxes = document.querySelectorAll(`input[name="${nombre}"]:checked`);
 if (checkboxes.length === 0) throw { msj: mensaje, elemento: document.querySelector(`input[name="${nombre}"]`) };
}

function validarTelefono(id, mensaje) {
 const telefono = document.getElementById(id);
 const patron = /^\+?[0-9]{7,14}$/; // Un patrón básico para números telefónicos internacionales.
 if (!patron.test(telefono.value)) throw { msj: mensaje, elemento: telefono };
}

function validarMayorEdad(id, mensaje) {
 const fechaNacimiento = document.getElementById(id);
 const fecha = new Date(fechaNacimiento.value);
 const hoy = new Date();
 const edad = hoy.getFullYear() - fecha.getFullYear();
 const m = hoy.getMonth() - fecha.getMonth();
 if (m < 0 || (m === 0 && hoy.getDate() < fecha.getDate())) {
     edad--;
 }
 if (edad < 18) throw { msj: mensaje, elemento: fechaNacimiento };
}

function validarURL(id, mensaje) {
 const sitioWeb = document.getElementById(id);
 const patron = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
 if (sitioWeb.value && !patron.test(sitioWeb.value)) throw { msj: mensaje, elemento: sitioWeb };
}