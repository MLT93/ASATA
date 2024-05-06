const myLinks = document.getElementsByTagName("a");
console.log(myLinks);

const newP = document.createElement("p");

let numEnlaces = myLinks.length;
console.log(`Cantidad de enlaces: ${numEnlaces}`);

// Ponemos `length - 2` porque si el final de un array es `length - 1`, entonces le restamos otro y conseguimos el penúltimo
let indexPenEnlace = myLinks.length - 2;
console.log(`Indice del penúltimo enlace: ${indexPenEnlace}`);

let penultimoEnlaceURL = myLinks[myLinks - 2].getAttribute("href");
console.log(
  `Dirección de enlace del penúltimo Ancor Tag: ${penultimoEnlaceURL}`
);

let URLs = "";
let cantidadEnlacesBuscados = 0;
for (let i = 0; i < myLinks.length; i++) {
  const element = myLinks[i];
  const enlace = element.getAttribute("href");
  console.log(enlace);

  // Utilizamos `slice` para recortar desde el índice 0 de la cadena de texto hasta el índice 14
  console.log(enlace.slice(0, 14));
  if (enlace.slice(0, 13) == "https://prueba") {
    cantidadEnlacesBuscados++
  }
}
