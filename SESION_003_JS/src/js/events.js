function estasEncimaEtiquetaH2() {
  alert("Estás encima de este elemento");
}
const myH2 = document.getElementById("onmouseover");
// Cuando le pasamos una función al `addEventListener()` no necesitamos invocarla porque la invocará automáticamente cuando ocurra el evento indicado
myH2.addEventListener("mouseover", estasEncimaEtiquetaH2);

function estasHaciendoClickEtiquetaH2() {
  alert("Estás haciendo click en este elemento");
}
const myH2_2 = document.getElementById("onclick");
myH2_2.addEventListener("click", estasHaciendoClickEtiquetaH2);

const bienHechoOver = () => {
  alert("¡Bien hecho!");
};

const buenTrabajoClick = () => {
  alert("¡Buen Trabajo!");
};

const mySpanOnClick = document.getElementById("spanOnClick");
mySpanOnClick.addEventListener("click", buenTrabajoClick);
mySpanOnClick.style.cursor = "pointer";

const myButtonOnClick = document.getElementById("buttonOnClick");
myButtonOnClick.addEventListener("click", buenTrabajoClick);
myButtonOnClick.style.cursor = "pointer";
myButtonOnClick.style.padding = "20px";

// `onload()` espera a cargar todos los recursos antes de ejecutar nada
window.onload(
  document.write("<br/><p><b>Ya se cargó la página por completo</b></p>")
);

// `DOMContentLoaded` carga una estructura básica y el contenido (sin imágenes, ni scripts asíncronos) antes del resto de recursos
document.addEventListener(
  "DOMContentLoaded",
  document.write("<br/><p><b>Ya se cargó el contenido de la página</b></p>")
);
