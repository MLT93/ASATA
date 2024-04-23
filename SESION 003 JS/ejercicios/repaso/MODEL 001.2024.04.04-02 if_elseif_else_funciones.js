//************************************************************************************************************************/
//************************************************************************************************************************/
//*******************************  CONVIERTE EN FUNCIONES LOS PROGRAMAS DEL EJERCICIO ANTERIOR ***************************/
//************************************************************************************************************************/
//************************************************************************************************************************/

// Clasificación por edades
// Escribe  una función que clasifique a las personas en categorías según su edad: menor de 12 años es niño, de 12 a 18 adolescente, de 19 a 60 adulto y mayor de 60 anciano.
// Invoca esa función para una edad de 45 años
// FUNCIÓN
function clasificacionEdades(edad) {
  if (edad < 12) {
    console.log("Niño");
  } else if (edad <= 18) {
    console.log("Adolescente");
  } else if (edad <= 60) {
    console.log("Adulto");
  } else {
    console.log("Anciano");
  }
}
//INVOCACIÓN
clasificacionEdades(45);

// Aprobado o suspenso
// Crea  una función que determine si un estudiante aprobó o suspendió un examen basándose en una calificación; se aprueba con 6 o más.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
function passedOrNot(number) {
  if (number >= 6) {
    console.log(`Examen aprobado`);
  } else {
    console.log(`Examen suspenso`);
  }
}
// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
passedOrNot(5);

// Identificación de números negativos, positivos y cero
// Escribe  una función que identifique si un número es positivo, negativo o cero.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
function identifiqueNegativeNumber(numero) {
  switch (true) {
    case typeof numero === "number" && numero < 0:
      console.log("Número negativo");
      break;
    case typeof numero === "number" && numero > 0:
      console.log("Número positivo");
      break;
    case typeof numero === "number" && numero === 0:
      console.log("Número cero");
      break;
    default:
      console.log("La variable debe contener un número");
      break;
  }
}
// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
identifiqueNegativeNumber(-5);

// Descuentos en una tienda
// Implementa una función de descuentos donde, si la compra es mayor a $100, se aplica un descuento del 10%.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
const calcCompra = function namedF(compra) {
  if (compra > 100) {
    let descuento = compra * 0.1;
    let total = compra - descuento;
    console.log(`Total con descuento: $${total}`);
  } else {
    console.log(`Total: $${compra}`);
  }
};
// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
calcCompra(150);

// Descuento por día de la semana
// Implementa otra función de descuentos donde Los miércoles hay un 15% de descuento en todas las compras. Calcula el total considerando este descuento si hoy es miércoles.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
let precio = 200;
const dia = "miércoles";
(() => {
  let descuentoWednesday = precio * 0.15;
  let total = precio - descuentoWednesday;
  let msg = "";
  dia === "miércoles"
    ? (msg = `Todos los ${dia} hay un descuento del 15% en los productos. Tu producto vale ${total}`)
    : (msg = `Hoy es un día sin descuentos`);
  console.log(msg);
})(precio, dia);

// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
/* No hace falta con IIFE porque se auto-invoca */

// Determinar el mayor de tres números
// Crea  una función que dados tres números, determine cuál es el mayor.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
const noNamedFMajorOf = function (a, b, c) {
  var major;
  if (a > b && a > c) {
    major = "'a' is biggest";
  } else if (b > a && b > c) {
    major = "'b' is biggest";
  } else if (c > a && c > b) {
    major = "'c' is biggest";
  }
  return major;
};

// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
let majorThanABC = noNamedFMajorOf(5, 10, 3);
console.log(majorThanABC);

// Categorías de películas por edad
// Crea  una función que basado en la edad de una persona, indica si puede ver una película para mayores de 18 años.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
const calcAgeForFilm = (edadPersona) => {
  let message = "";
  edadPersona >= 18
    ? (message = "Edad permitida para esta película")
    : (message = "Edad insuficiente para esta película");
  console.log(message);
};

// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
calcAgeForFilm(16);

// Calculadora simple de IMC
// Realiza una función que sea una calculadora simple de IMC (Índice de Masa Corporal) e indica si la persona está bajo peso, en peso normal, o con sobrepeso. Considera bajo peso si el IMC es menor a 18.5, normal entre 18.5 y 24.9, y sobrepeso si es 25 o más.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
function calcImc(pesoEnKg, alturaEnM) {
  let imc = pesoEnKg / alturaEnM ** 2;
  if (imc < 18.5) {
    console.log("Bajo peso");
  } else if (imc <= 24.9) {
    console.log("Peso normal");
  } else {
    console.log("Sobrepeso");
  }
}
// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
calcImc(70, 1.75);

//Calcular el Índice de Hidratación Personalizado (IHP= consumo Agua al dia (ml) / peso (Kg)):
// Realiza una función que sea una calculadora simple del IHP te indica si estás bebiendo la cantidad adecuada de agua al día, según tu peso. La recomendación general es beber al menos 35 ml de agua por cada kilo de peso corporal.
// Bajo: Menos de 30 ml por kilo.
// Adecuado: Entre 30 ml y 35 ml por kilo.
// Óptimo: Más de 35 ml por kilo.
// FUNCIÓN
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
function calcIhp(aguaEnLitros, pesoEnKg) {
  let l_to_ml = aguaEnLitros * 1000;
  let ihp = Math.floor(l_to_ml / pesoEnKg);
  console.log(ihp);
  if (ihp < 30) {
    console.log("Tu IHP es Bajo");
  } else if (ihp >= 30 && ihp <= 35) {
    console.log("Tu IHP es Adecuado");
  } else {
    console.log("Tu IHP es Óptimo");
  }
}

// INVOCACIÓN
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/
let result = calcIhp(2.5, 70);
