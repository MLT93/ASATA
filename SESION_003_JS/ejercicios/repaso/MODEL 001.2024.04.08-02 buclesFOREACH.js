// Sumar los elementos de un array
// Dado un array de números, usa forEach para sumar sus elementos.
let numeros = [1, 2, 3, 4, 5];
let suma = 0;

function sumarElementos(arrayNumeros) {
  arrayNumeros.forEach(function (numero) {
    suma += numero;
  });
  console.log(suma);
}
sumarElementos(numeros);

// Encontrar y listar los números impares de un array
let conjuntoNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let impares = [];

function listarImpares(arrayNumeros) {
  //*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
  impares = arrayNumeros.filter((e) => e % 2 === 1);
  console.log(impares);
  return impares;
}
listarImpares(conjuntoNumeros);

// Convertir todos los elementos de un array a mayúsculas
let frutas = ["manzana", "banana", "cereza"];
let frutasMayusculas = [];

frutas.forEach((fruta) => frutasMayusculas.push(fruta.toUpperCase()));
console.log(frutasMayusculas);

// Dado un array de strings, crea un nuevo array que contenga la longitud de cada cadena.
let palabras = ["JavaScript", "HTML", "CSS"];
let longitudes = [];
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
palabras.forEach((e) => longitudes.push(e.length));
console.log(longitudes);

// Contar las palabras que tienen más de 5 letras en un array de strings
let textos = ["radar", "JavaScript", "sol", "mundo", "programar"];
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
let textChartOverFive = [];
textos.forEach((e) => (e.length > 5 ? textChartOverFive.push(e) : null));
console.log(textChartOverFive);
