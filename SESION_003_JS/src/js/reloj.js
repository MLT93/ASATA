// La llamada a la función siempre debe hacerse donde necesitamos la función (en el HTML)
const reloj = () => {
  let date = new Date();

  let h = date.getHours();

  let m = date.getMinutes();

  let s = date.getSeconds();

  // Llamo el documento del HTML, agarro el id del reloj y le agrego un string con la información que deseo
  document.getElementById("reloj").innerHTML = `La hora es -> ${h}:${m}:${s}`;

  // Llamar una función dentro de otra se llama 'Callback' o 'Recursividad'. En este caso, hay dos funciones, una dentro de la otra. La primera llama `setTimeout();` después de cargar toda la página. y el otra carga la función `reloj(); dentro de `setTimeout();`
  document.addEventListener(
    "DOMContentLoaded",
    setTimeout(() => reloj(), 1000)
  );
};

reloj();
