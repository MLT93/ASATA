// Clasificación por edades
// Escribe un programa que clasifique a las personas en categorías según su edad: menor de 12 años es niño, de 12 a 18 adolescente, de 19 a 60 adulto y mayor de 60 anciano.
// DATOS
let edad = 25;
// PROGRAMA
if (edad < 12) {
  console.log("Niño");
} else if (edad <= 18) {
  console.log("Adolescente");
} else if (edad <= 60) {
  console.log("Adulto");
} else {
  console.log("Anciano");
}

// Aprobado o suspenso
// Crea un programa que determine si un estudiante aprobó o suspendió un examen basándose en una calificación; se aprueba con 6 o más.
// DATOS
let calificacion = 5;
// PROGRAMA
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/


// Identificación de números negativos, positivos y cero
// Escribe un programa que identifique si un número es positivo, negativo o cero.
// DATOS
let numero = -5;
// PROGRAMA
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/


// Descuentos en una tienda
// Implementa un sistema de descuentos donde, si la compra es mayor a $100, se aplica un descuento del 10%.
// DATOS
let compra = 150;
// PROGRAMA
if (compra > 100) {
  let descuento = compra * 0.10;
  let total = compra - descuento;
  console.log(`Total con descuento: $${total}`);
} else {
  console.log(`Total: $${compra}`);
}

// Descuento por día de la semana
// Los miércoles hay un 15% de descuento en todas las compras. Calcula el total considerando este descuento si hoy es miércoles.
// DATOS
let precio = 200;
let dia = "miércoles";
// PROGRAMA
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/



// Determinar el mayor de tres números
// Crea un programa que dados tres números, determine cuál es el mayor.
// DATOS
let a = 5;
let b = 10;
let c = 3;
// PROGRAMA
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/


// Categorías de películas por edad
// Basado en la edad de una persona, indica si puede ver una película para mayores de 18 años.
// DATOS
let edadPersona = 16;
// PROGRAMA
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/


// Calculadora simple de IMC
// Realiza una calculadora simple de IMC (Índice de Masa Corporal) e indica si la persona está bajo peso, en peso normal, o con sobrepeso. Considera bajo peso si el IMC es menor a 18.5, normal entre 18.5 y 24.9, y sobrepeso si es 25 o más.
// DATOS
let peso = 70; // kg
let altura = 1.75; // metros
// PROGRAMA
let imc = peso / (altura * altura);
if (imc < 18.5) {
  console.log("Bajo peso");
} else if (imc <= 24.9) {
  console.log("Peso normal");
} else {
  console.log("Sobrepeso");
}

//Calcular el Índice de Hidratación Personalizado (IHP= consumo Agua al dia (ml) / peso (Kg)):
// El IHP te indica si estás bebiendo la cantidad adecuada de agua al día, según tu peso. La recomendación general es beber al menos 35 ml de agua por cada kilo de peso corporal.
// Bajo: Menos de 30 ml por kilo.
// Adecuado: Entre 30 ml y 35 ml por kilo.
// Óptimo: Más de 35 ml por kilo.
// DATOS
let pesoKg = 70; // Peso en kilogramos
let consumoAguaDiaL = 2.5; // Consumo de agua al día en litros
// PROGRAMA
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
