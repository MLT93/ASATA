function mostrarParrafos() {
  let parrafosPorEtiqueta = document.getElementsByTagName("p");
  let parrafosPorClase = document.getElementsByClassName("paragraph");
  let myP1 = document.getElementById("p1");
  let parrafoQuerySelector = document.querySelector(".paragraph-query");

  console.log(parrafosPorEtiqueta);
  console.log(parrafosPorClase);
  console.log(myP1);
  console.log(parrafoQuerySelector);
}
mostrarParrafos();

const myButtonOnClick = document.getElementById("buttonOnClick");
myButtonOnClick.addEventListener(
  "click",
  () => (document.getElementById("p1").innerHTML = "Nuevo texto")
);

let contenido = [];

const pideContenido = () => {
  document.addEventListener("DOMContentLoaded", () => {
    let aux = 0;
    while (aux < 3) {
      let texto = prompt("INGRESA 3 TEXTOS \n\n Utiliza 'FIN' para salir");
      if (texto === "FIN" || texto === "fin") {
        break;
      } else {
        contenido.push(texto);
        aux++;
      }
    }
    return contenido;
  });
  console.log(contenido);
  return contenido;
};

const conteidoPersonalizado = (callback, array) => {
  callback();

  const elementP1 = document.getElementById("p1");
  const elementP2 = document.getElementById("p2");
  const elementP3 = document.getElementById("p3");

  const buttonOnClick = document.getElementById("buttonOnClick");
  buttonOnClick.addEventListener("click", () => {
    elementP1.innerHTML = array[0];
    elementP2.innerHTML = array[1];
    elementP3.innerHTML = array[2];

    elementP1.style.textAlign = ç2right
  });
};
conteidoPersonalizado(pideContenido, contenido);
