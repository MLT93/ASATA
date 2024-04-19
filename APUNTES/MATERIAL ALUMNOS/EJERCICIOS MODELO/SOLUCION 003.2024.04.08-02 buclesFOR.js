
// Sumar los números del 1 al 100
// Usa un bucle for para sumar los números del 1 al 100.
// Función ad hoc: sumarNumeros.

function sumarNumeros() {
  let suma = 0;
  for (let i = 1; i <= 100; i++) {
    suma += i;
  }
  return suma;
}
console.log(sumarNumeros());


// Multiplica los 10 primeros números naturales (1 al 10).
// Función ad hoc: multiplicarNumeros.

function multiplicarNumeros() {
  let producto = 1;
  for (let i = 1; i <= 10; i++) {
    producto *= i;
  }
  return producto;
}
console.log(multiplicarNumeros());


// Listar los números pares del 0 al 50
// Usa un bucle for para imprimir los números pares del 0 al 50.
// Función ad hoc: listarPares.

function listarPares() {
  for (let i = 0; i <= 50; i += 2) {
    console.log(i);
  }
}
listarPares();

// Genera un array con los cuadrados de los primeros 10 números enteros.
// Función ad hoc: generarCuadrados.

function generarCuadrados() {
  let cuadrados = [];
  for (let i = 1; i <= 10; i++) {
    cuadrados.push(i * i);
  }
  return cuadrados;
}
console.log(generarCuadrados());

// Contar cuántas veces aparece una letra en una cadena
// Dada una cadena y una letra, cuenta cuántas veces aparece la letra en la cadena.
// Función ad hoc: contarLetra.

function contarLetra(cadena, letra) {
  let contador = 0;
  for (let i = 0; i < cadena.length; i++) {
    if (cadena[i] === letra) {
      contador++;
    }
  }
  return contador;
}
console.log(contarLetra("hola mundo", "o"));

// Escribe una función que tome una cadena como argumento y devuelva esa cadena invertida. Por ejemplo, si pasas la cadena "hola", la función debería devolver "aloh".
function invertirCadena(cadena) {
 let cadenaInvertida = "";
 for (let i = cadena.length - 1; i >= 0; i--) {
   cadenaInvertida += cadena[i];
 }
 return cadenaInvertida;
}
console.log(invertirCadena("hola mundo"));


// Crea una función que reciba una cadena y devuelva el número total de vocales (a, e, i, o, u) que contiene esa cadena, sin importar si son mayúsculas o minúsculas.
function contarVocales(cadena) {
 let contador = 0;
 let vocales = "aeiouAEIOU";
 for (let i = 0; i < cadena.length; i++) {
   if (vocales.includes(cadena[i])) {
     contador++;
   }
 }
 return contador;
}
console.log(contarVocales("Hola Mundo"));