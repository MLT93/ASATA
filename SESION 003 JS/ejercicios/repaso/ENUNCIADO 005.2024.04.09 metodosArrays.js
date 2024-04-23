///////// UTILIZA EL MÉTODO ADECUADO PARA ARRAYS PARA REALIZAR LOS SIGUIENTES EJERCICIOS //////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Añadir 5 Ciudades, usando el método adecuado:
let ciudades = [];
/* Añade uno siempre al final del array */
ciudades.push("Madrid", "Barcelona", "Valencia", "Gijón", "Teruel");
console.log(ciudades);

// Encontrar el índice de un elemento, usando el método adecuado:
let num = [1, 2, 5, 7, 10];
/* Busca un elemento desde un index específico. Si lo encuentra, devuelve el primer índice encontrado */
/* indexOf(elementSearched, indexStartingSearch) */
const searched = num.indexOf(2, 0);
console.log(searched);

// Eliminar el último elemento de un array, usando el método adecuado:
let frutas = ["manzana", "banana", "cereza"];
/* Borra el último elemento del array */
const deletedFruta = frutas.pop();
console.log(deletedFruta);

// Agregar un elemento al inicio de un array, usando el método adecuado:
let notas = [10, 20, 30];
/* Añade al inicio del array un elemento */
notas.unshift(7);
console.log(notas[0]);

// Eliminar el primer elemento de un array, usando el método adecuado:
let colores = ["rojo", "verde", "azul"];
/* Quita el primer elemento del array */
colores.shift();
console.log(colores);

// Usar splice para eliminar "c" por su índice:
let letras = ["a", "b", "c", "d", "e"];
/* splice(indexStart, numOfElementsToDelete, addItems...) */
letras.splice(2, 1);
console.log(letras);

// Crear una copia de un array con slice:
let original = [1, 2, 3, 4, 5];
/* Devuelve una copia de la sección del array recortada. Si utilizas números negativos empieza desde el último elemento hasta el primero (invierte la lectura) */
/* slice(indexStart (included), indexEnd (excluded)) */
const newCopyOfOriginal = original.slice();
console.log(newCopyOfOriginal);

// Concatenar dos arrays, usando el método adecuado:
let primerArray = [1, 2, 3];
let segundoArray = [4, 5, 6];
/* Reúne dos o más arrays en uno solo */
let concatArray = primerArray.concat(segundoArray);
console.log(concatArray);

// Encontrar si al menos un elemento cumple con una condición (mayor que 10), usando el método adecuado:
let lista = [2, 5, 8, 1];
/* Devuelve el primer elemento encontrado después de cumplir una condición. Si no lo encuentra, devuelve "undefined" */
let findCondition = lista.find((e) => e > 10);
console.log(findCondition);

// Comprobar si todos los elementos cumplen una condición (mayor que 10), usando el método adecuado:
let valores = [10, 20, 30, 40];
/* Se fija si todos los elementos de un array cumplen una condición determinada */
const isMayorThanTen = lista.every((e) => e > 10);
console.log(isMayorThanTen);

// Transformar elementos de un array (multiplicar por 5), usando el método adecuado:
let array = [1, 2, 3, 4];
const transformedArray = array.map((e) => e * 2);
console.log(transformedArray);

// Filtrar elementos de un array (solo números > 10), usando el método adecuado:
let nums = [5, 10, 15, 20];
/* Devuelve un nuevo array con los elementos que pasan una condición con éxito (devolviendo true) */
const filteredNums = nums.filter((e) => e > 10);
console.log(filteredNums);

// Reducir un array a un valor (suma de todos los elementos del array), usando el método adecuado:
let resultados = [1, 2, 3, 4, 5];
let initialValue = 0;
const theResult = resultados.reduce(
  (accumulator, elementCurrentValue) => (accumulator += elementCurrentValue),
  initialValue
);
console.log(theResult);

// Revertir el orden de los elementos de un array (reverse), usando el método adecuado:
let strings = ["uno", "dos", "tres"];
/* Invierte el orden de un array */
strings.reverse();
console.log(strings);

// Ordenar un array de números (sort), usando el método adecuado:
let numeros = [4, 2, 5, 1, 3];
/* Reorganiza los elementos dentro de un array */
numeros.sort();
console.log(numeros);
