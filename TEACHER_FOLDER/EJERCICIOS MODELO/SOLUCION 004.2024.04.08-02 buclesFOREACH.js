
// Sumar los elementos de un array
// Dado un array de números, usa forEach para sumar sus elementos.
let numeros = [1, 2, 3, 4, 5];
let suma = 0;

function sumarElementos(arrayNumeros){
 arrayNumeros.forEach(function(numero) {
  suma += numero;
 });
 console.log(suma);
}
sumarElementos(numeros);


// Encontrar y listar los números impares de un array
let conjuntoNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let impares = [];

function listarImpares(arrayNumeros){
 arrayNumeros.forEach(numero => {
   if (numero % 2 !== 0) {
     impares.push(numero);
   }
 });
 console.log(impares);
}
listarImpares(conjuntoNumeros);



// Convertir todos los elementos de un array a mayúsculas
let frutas = ["manzana", "banana", "cereza"];
let frutasMayusculas = [];

frutas.forEach(fruta => frutasMayusculas.push(fruta.toUpperCase()));
console.log(frutasMayusculas);


// Dado un array de strings, crea un nuevo array que contenga la longitud de cada cadena.
let palabras = ["JavaScript", "HTML", "CSS"];
let longitudes = [];
palabras.forEach(palabra => longitudes.push(palabra.length));
console.log(longitudes);



// Contar las palabras que tienen más de 5 letras en un array de strings
let textos = ["radar", "JavaScript", "sol", "mundo", "programar"];
let contador = 0;
textos.forEach(cadena => {
  if (cadena.length > 5) {
    contador++;
  }
});
console.log(contador);