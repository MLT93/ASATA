const frutas = [
  "pera",
  "manzana",
  "banana",
  "melón",
  "sandía",
  "mango",
  "frutilla",
];

const frutas2 = ["limón", "lima", "naranja"];

// Agregar al final `.push()`
(() => frutas.push("uva"))();
// Agregar al inicio `.unshift()`
(() => frutas.unshift("piña"))();
// Borrar el último `.pop()`
(() => frutas.pop())();
// Borrar el primero `.shift()`
(() => frutas.shift())();
// Borrar el contenido del índice seleccionado pero no el espacio que ocupa 'delete'
(() => delete frutas[2])();
// Inicia desde un índice, Borra una cantidad de elementos y Agrega otros `.splice()`
(() => frutas.splice(2, 0, "Physalis alkekengi"))();
// Recortar desde un índice (incluso) hasta otro (excluso) `.slice()`. Guarda el recorte en un array nuevo
(() => frutas.slice(1, 3))();
console.log(frutas);
// Devuelve un nuevo arreglo después de cumplir una condición con resultado "true" `.filter()`
(() =>
  frutas.filter((a) => {
    if (a === "banana") {
      return a;
    }
  }))();
// Transforma los elementos de un array para obtener de vuelta un listado de elementos nuevos o modificados `.map()`
(() => frutas.map((e) => e.length))();
// Concatena dos arrays `.concat()`
(() => {
  let todasLasFrutas = frutas.concat(frutas2);
  console.log(todasLasFrutas);
})();
// Ordena el array `.sort()`. Recuerda que para Arrays de objetos debes utilizar un bucle `.map()`, `.filter()` o (for(){}) para iterar el array y utilizar `.toLowerCase()` para no tener cuenta de las letras mayúsculas o minúsculas.
// Devuelve el índice del elemento especificado dentro del array `.indexOf("mango")`

const longitudArrDeFrutas = frutas.length;

console.log(frutas);
console.log(longitudArrDeFrutas);

const coches = ["BMW", "Seat", "Renault"];

function listaDeCoches(arr) {
  console.log(arr[0]);
  console.log("Longitud:", arr.length);
  console.log(
    `Longitud: ${arr.push("Citroen", "Mercedes")} | Array: [${arr.join(", ")}]`
  );
  console.log(`Longitud: ${arr.unshift("Audi")} | Array: [${arr.join(", ")}] `);
  console.log(
    `Longitud: ${arr.length} | Primer Elemento: ${
      arr[0]
    } | Eliminado: ${arr.splice(0, 1)} | Array: [${arr.join(
      ", "
    )}] | Longitud: ${arr.length}`
  );
  console.log(
    `Último Elemento: ${arr.splice(arr.length - 1)} | Eliminado: ${arr.splice(
      0,
      1
    )} | Array: [${arr.join(", ")}]`
  );
}
listaDeCoches(coches);

// Crear una Matriz (Arrays dentro de 1 Array)
let a1 = ["coche", "moto"];
let a2 = ["avión", "bicicleta"];

const vehicles = [];

vehicles[0] = a1;
vehicles[1] = a2;

// Matriz
console.log(vehicles);

// Buscar un índice dentro del contenido de otro índice
console.log(vehicles[0][1]);

let coches1 = ["BMW", "Seat", "Renault"];
let coches2 = ["Mercedes", "Peugeot"];
let coches3 = ["Citroen"];

let arrCoches = coches1.concat(coches2).concat(coches3);

console.log(arrCoches);

arrCoches.splice(3, 0, "Audi", "Fiat");

console.log(arrCoches);

arrCoches.sort();

console.log(arrCoches);

// Ordenar Array de objectos
const arrDeObjs = [
  { id: 1, name: "PAltOS" },
  { id: 2, name: "AVEllANaS" },
  { id: 3, name: "cEREZAS" },
  { id: 4, name: "NOGALES" },
  { id: 5, name: "aZÚCAR" },
  { id: 6, name: "aRÁndANOS" },
  { id: 7, name: "banaNAs" },
];
arrDeObjs.sort((a, b) => {
  if (a.name.toLowerCase() < b.name.toLowerCase()) {
    return -1;
  }
  if (a.name.toLowerCase() > b.name.toLowerCase()) {
    return 1;
  }
  return 0;
});

console.log(arrDeObjs);
