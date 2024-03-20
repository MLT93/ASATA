// Al crer una función, estamos en proceso de "definición" eso significa que todas las variables y código que se crea dentro de ella, no se podrá utilizar fuera de ella.
// Si deseamos utilizar una variable fuera de la función (`scope` global) con el `output` que ésta pudiera devolver, tendremos que declarar la variable afuera de la función y antes de que se defina
// No tiene sentido declarar una variable dentro de la función para utilizarla afuera de ella
// El `input` de una función son los parámetros que pueda recibir
// El `return` de una función me devuelve los valores que procesados en ella. Después de la declaración del `return` ninguna otra declaración será considerada al interno de la "definición" de una función, por lo tanto siempre se pone al final
// Para ver los `console.log()` sin un entorno "Node.js" debemos entrar en el inspector (Developer tools) de nuestro navegador, y en él tendremos la `consola` (console) disponible para ver los resultados o las "depuraciones"

/* `input` de la función `(params)`. Son los parámetros que recibe la función para utilizar elementos externos a ella */
function fechaHoy() {
  let currentDate = new Date();
  document.write(currentDate);

  /* `output` de la función. Si no ponto `return` no vamos a poder trabajar con ese elemento fuera de la función */
  return currentDate;
}

const myP = document.createElement("p");
myP.innerHTML = fechaHoy();
document.getElementById("function").appendChild(myP);

/* Asigno el `output` de la función a una variable */
let fecha = fechaHoy();
document.write("  ***** ");
/*  Si no tengo un `return` en la función no podré utilizar los métodos o las propiedades que tenga en ella */
document.write(fecha.getDay());
document.write("  ***** ");
document.write(fecha.getMonth());
document.write("  ***** ");
document.write(fecha.getFullYear());

const iva = 1.21; /* Es 1.21 porque el impuesto es 21% y sale a 0.21, pero debemos multiplicar la operación por sí misma para que no me devuelva solo la diferencia, sino todo el importe */
let precioProducto = prompt("¿Precio?");
let cantidad = prompt("¿Cantidad?");

Number(precioProducto);
Number(cantidad);

/* Los nombres de los parámetros no tienen relación con los nombres de las variables externas a la función. Es simplemente para poderle pasar información desde afuera a la función */
const carritoPrimitivo = (impuesto, precio, cantidad) => {
  let operation = precio * cantidad * impuesto;
  return operation; /* `output` */
};

let resultado = carritoPrimitivo(iva, precioProducto, cantidad);

console.log(`El coste del producto es: ${resultado}`);

const myP2 = document.createElement("p");
myP2.innerHTML = `El precio del producto más IVA es: ${carritoPrimitivo(
  iva,
  precioProducto,
  cantidad
)}`;
document.getElementById("function").appendChild(myP2);

/* Si declaramos las variables fuera de la función podremos acceder a ellas desde dentro de esa función debido al SCOPE */
let carrito = [];
var precioUnitario = "";
var unidades = "";

/* Envío un `alert` para avisar al cliente */
alert(
  "Vamos a crear una Matriz de precios y cantidades para sacar el coste total"
);

while (precioUnitario != "FIN" && unidades != "FIN") {
  var precioUnitario = prompt("INTRODUCE UN PRECIO");
  var unidades = prompt("INTRODUCE UNA CANTIDAD");

  precioUnitario = precioUnitario.toLocaleLowerCase();
  unidades = unidades.toLocaleLowerCase();

  var inputs = [];

  inputs.push(precioUnitario); /* `inputs` después de esta línea tiene 1 elemento */
  inputs.push(unidades); /* `inputs` después de esta línea tiene 2 elementos */

  /* [ precioUnitario, unidades ] */

  if (inputs[0] === "fin" || inputs[1] === "fin") {
    break;
  } else {
    carrito.push(inputs);
  }
}
/* console.log(carrito); */

function total(array) {
  console.log(array);
  var cantidadTotal = 0;

  for (let i = 0; i < array.length; i++) {
    /* En este caso es otro `Array` porque estamos iterando una `Matriz` */
    const element = array[i];

    /* Suma de los precios de los elementos de la Matriz */
    cantidadTotal = element[0] * element[1] + cantidadTotal;

    /* Esto nos hace ver la suma en las iteraciones una a una */
    console.log(cantidadTotal);
  }
  return cantidadTotal;
}

var cantidadTotal = total(carrito);
const myP3 = document.createElement("p");
myP3.innerHTML = `El coste total de los productos es: ${cantidadTotal}`;
document.getElementById("function").appendChild(myP3);
