/// DECLARACIÓN DE UNA FUNCIÓN COMO FUNCIÓN COMÚN
/* Permite llamar la función antes de su definición  */
let nombre = "Marcos";
console.log("1º Forma de declarar una función: COMÚN");
console.log(hola(nombre));

function hola(params) {
  return `Hola ${params}!`;
}

/// DECLARACIÓN DE UNA FUNCIÓN COMO FUNCIÓN ANÓNIMA
/* No permite llamar la función antes de su definición */
let despedir = function (params) {
  return `Adiós ${params}`;
};
console.log("2ª Forma de declarar una función: ANÓNIMA");
console.log(despedir(nombre));

/// DECLARACIÓN DE UNA FUNCIÓN COMO FUNCIÓN NOMBRADA
/* No permite llamar la función antes de su definición */
/**
 *
 * @param {factorial} number
 *
 * Operación que multiplica todos los números enteros desde 1 hasta n.
 * ¿Qué es el factorial de un número? El factorial de un número natural n es el producto de todos los números naturales consecutivos desde 1 hasta n. Se representa con un signo de exclamación (!) detrás del número. Por ejemplo:
 * El factorial de 3 (escrito como 3!) es igual a 3 × 2 × 1 = 6.
 * ¿Por qué 0! = 1? Aunque pueda parecer sorprendente, se establece que 0! = 1. Esto es un caso base en matemáticas y tiene aplicaciones en diversas áreas. Aquí está la razón:
 * Imagina que tienes un conjunto vacío de elementos. Si calculamos el factorial de este conjunto vacío (que es 0!), el resultado debe ser 1. Esto se hace para que las fórmulas y propiedades matemáticas sigan siendo coherentes.
 * Procedimiento de cálculo del factorial:
 * Para calcular el factorial de un número n, multiplicamos todos los números naturales desde 1 hasta n.
 * Por ejemplo:
 * 5! se calcula como 5 × 4 × 3 × 2 × 1 = 120.
 * 4! se calcula como 4 × 3 × 2 × 1 = 24.
 * Propiedades del factorial:
 * El factorial de un número se puede expresar en función de otro factorial. Por ejemplo:
 * 5! = 5 × 4!
 * 10! = 10 × 9 × 8!
 * 25! = 25 × 24 × 23 × 22!
 * Además, el factorial de 0 y 1 siempre es la unidad:
 * 0! = 1
 * 1! = 1
 * En resumen, el factorial es una herramienta matemática poderosa que nos ayuda a resolver problemas de conteo y cálculos combinatorios en diversas disciplinas.
 *
 * @returns
 */
const factorial = function fact(n) {
  return n < 2 ? 1 : n * fact(n - 1);
};
console.log("3ª Forma de declarar una función: NOMBRADA");
console.log(`El factorial de 5 es: ${factorial(5)}`);

/// DECLARACIÓN DE UNA FUNCIÓN COMO FUNCIÓN ARROW
/* No permite llamar la función antes de su definición */
/* El valor de `this` queda asociado permanentemente al valor de `this` de su ámbito externo inmediato. Esto significa que no necesitamos utilizar la palabra clave */
const cuadrado = (n) => n * n;
console.log("4ª Forma de declarar una función: ARROW");
console.log(`El factorial de 3 es: ${cuadrado(3)}`);

/// DECLARACIÓN DE UNA FUNCIÓN COMO INSTANCIA DE UN CONSTRUCTOR
/* No permite llamar la función antes de su definición */
const sumar = new Function("a", "b", `return a+b`);
console.log("5ª Forma de declarar una función: INSTANCIA");
console.log(`La suma de 5 y 3 es: ${sumar(5, 3)}`);

///////////////////////////// EJERCICIOS /////////////////////////////////

// 1 COMÚN
function conversionFaCT(paramsFahrenheit) {
  /* CT = (F - 32) * (5 / 9) */
  return ((paramsFahrenheit - 32) * (5 / 9)).toFixed(2);
}
console.log("Declaración COMÚN:");
console.log(`Conversión de 212ºF son: ${conversionFaCT(212)}º Celsius`);
// 2 ANÓNIMA
let conversionCTaF = function (paramsCelsius) {
  /* F = CT * (9 / 5) + 32 */
  return (paramsCelsius * (9 / 5) + 32).toFixed(2);
};
console.log("Declaración ANÓNIMA:");
console.log(`Conversión de 100ºC son: ${conversionCTaF(100)}º Fahrenheit`);
// 3 NOMBRADA
const saludar = function saludo() {
  return `Hola soy una función nombrada`;
};
console.log("Declaración NOMBRADA:");
console.log(`El saludo es: ¡${saludar()}!`);
// 4 ARROW
const saludito = () => {
  return `Hola soy una arrow function`;
};
console.log("Declaración ARROW:");
console.log(`El saludo es: ¡${saludito()}!`);
// 5 INSTANCIA DE UN CONTRUCTOR
const saludando = new Function(`return 'Hola soy una instancia de un Constructor'`);
console.log(`El saludo es: ¡${saludando()}!`);