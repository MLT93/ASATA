function miBoton() {
  const input1 = document.getElementById("boton-1");

  input1.style.width = "200px";
  input1.style.height = "30px";

  // Llamar la función después que se carga la página
  document.addEventListener("DOMContentLoaded", miBoton());
}
miBoton();

function miTexto() {
  const p1 = document.getElementById("texto-1");

  p1.style.width = "300px";

  // Llamar la función después que se carga la página
  document.addEventListener("DOMContentLoaded", miBoton());
}
miTexto();

const edificio = {
  material: "piedra",
  ciudad: "Gijón",
  altura: "200m",
  metrosCuadrados: 740,
  plantas: 7,
  jardin: false,
  condominial: true,
  ascensor: true,
};

var planta = {
  nViviendas: 3,
  nPlanta: 2,
  nVentanas: 9,
};
