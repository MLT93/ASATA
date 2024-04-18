///////// UTILIZA EL MÉTODO ADECUADO PARA ARRAYS PARA REALIZAR LOS SIGUIENTES EJERCICIOS //////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Añadir 5 Ciudades, usando el método adecuado:
let ciudades = [];
ciudades.push("Madrid", "Barcelona", "Valencia");

// Encontrar el índice de un elemento:
// Dado un array de números, utiliza el método indexOf para encontrar la posición del número 5.


let num = [1, 2, 5, 7, 10];
let indice = num.indexOf(5);

// Eliminar el último elemento de un array:
// Usa el método pop para eliminar el último elemento de un array de frutas.


let frutas = ["manzana", "banana", "cereza"];
frutas.pop();

// Agregar un elemento al inicio de un array:
// Utiliza el método unshift para agregar un elemento al inicio de un array de números.


let notas = [10, 20, 30];
notas.unshift(5);

// Eliminar el primer elemento de un array:
// Emplea el método shift para eliminar el primer elemento de un array de colores.


let colores = ["rojo", "verde", "azul"];
colores.shift();

// Usar splice para eliminar un elemento por su índice:
// Dado un array de letras, utiliza splice para eliminar la letra en la posición 2.


let letras = ['a', 'b', 'c', 'd', 'e'];
letras.splice(2, 1);

// Crear una copia de un array con slice:
// Utiliza el método slice para crear una copia de un array de números sin modificar el original.


let original = [1, 2, 3, 4, 5];
let copia = original.slice();

// Concatenar dos arrays:
// Usa el método concat para unir dos arrays de números en uno solo.


let primerArray = [1, 2, 3];
let segundoArray = [4, 5, 6];
let unidos = primerArray.concat(segundoArray);

// Encontrar si al menos un elemento cumple con una condición (some):
// Determina si al menos un número en el array es mayor que 10.


let lista = [2, 5, 8, 1];
let mayorQueDiez = lista.some(numero => numero > 10);

// Comprobar si todos los elementos cumplen una condición (every):
// Verifica si todos los números en el array son positivos.


let valores = [10, 20, 30, 40];
let todosPositivos = valores.every(numero => numero > 0);

// Transformar elementos de un array (map):
// Crea un nuevo array que contenga el cuadrado de cada número del array original.


let array = [1, 2, 3, 4];
let cuadrados = array.map(numero => numero ** 5);

// Filtrar elementos de un array (filter):
// Usa filter para crear un array solo con los números mayores de 10.


let nums = [5, 10, 15, 20];
let filtrados = nums.filter(numero => numero > 10);

// Reducir un array a un valor (reduce):
// Calcula la suma de todos los números en un array.


let resultados = [1, 2, 3, 4, 5];
let suma = resultados.reduce((acumulador, valorActual) => acumulador + valorActual, 0);

// Revertir el orden de los elementos de un array (reverse):
// Invierte el orden de los elementos en un array de strings.


let strings = ["uno", "dos", "tres"];
strings.reverse();

// Ordenar un array de números (sort):
// Ordena un array de números de menor a mayor.


let numeros = [4, 2, 5, 1, 3];
numeros.sort((a, b) => a - b);