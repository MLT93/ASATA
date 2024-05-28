// Operadores y Estructuras de Control

//Operadores aritméticos

//Suma
let suma = 5 + 5;// se asigna el valor de la suma a la variable suma
console.log(suma); // se imprime el valor de la variable suma

//Resta
let resta = 10 - 5;// se asigna el valor de la resta a la variable resta
console.log(resta); // se imprime el valor de la variable resta

//Multiplicación
let multiplicar = 5 * 5;// se asigna el valor de la multiplicar a la variable multiplicar
console.log(multiplicar); // se imprime el valor de la variable multiplicar

//División
let division = 10 / 5;
console.log(division);

//Módulo
let modulo = 10 % 5;
console.log(modulo);

//Incremento
let incremento = 10;
incremento++;// incremento se le suma 1
console.log(incremento);

//Decremento
let decremento = 10;
decremento--;// decremento se le resta 1
console.log(decremento);

//Operadores de asignación

//Asignación
let asignar = 10;
console.log(asignar);

//Suma y asignación
let actualizaValorConSuma = 10;
actualizaValorConSuma += 5;//actualizaValorConSuma = actualizaValorConSuma + 5
console.log(actualizaValorConSuma); // se imprime el valor de la variable actualizaValorConSuma

//Resta y asignación
let actualizaValorConResta = 10;
actualizaValorConResta -= 5;//actualizaValorConResta = actualizaValorConResta - 5
console.log(actualizaValorConResta); // se imprime el valor de la variable actualizaValorConResta

//Multiplicación y asignación
let actualizaValorConMultiplication = 10;
actualizaValorConMultiplication *= 5;//actualizaValorConMultiplication = actualizaValorConMultiplication * 5
console.log(actualizaValorConMultiplication); // se imprime el valor de la variable actualizaValorConMultiplication

//División y asignación
let actualizaValorConDivision = 10;
actualizaValorConDivision /= 5;//actualizaValorConDivision = actualizaValorConDivision / 5
console.log(actualizaValorConDivision); // se imprime el valor de la variable actualizaValorConDivision

// Módulo y asignación
let actualizaValorConModule = 10;
actualizaValorConModule %= 5;//actualizaValorConModule = actualizaValorConModule % 5
console.log(actualizaValorConModule); // se imprime el valor de la variable actualizaValorConModule

//Operadores de comparación

//Igualdad
let igualdad = 10 == 10;
console.log(igualdad);// se imprime true el valor de la variable igualdad

//Igualdad estricta
let igualdadEstricta = 10 === 10;
console.log(igualdadEstricta);// se imprime true el valor de la variable igualdadEstricta

let igualdadEstricta2 = 10 === '10';
console.log(igualdadEstricta2);// se imprime false el valor de la variable igualdadEstricta2

//Desigualdad
let desigualdad = 10 != 10;
console.log(desigualdad);// se imprime false el valor de la variable desigualdad

//Desigualdad estricta  
let desigualdadEstricta = 10 !== 10;
console.log(desigualdadEstricta);// se imprime false el valor de la variable desigualdadEstricta

let desigualdadEstricta2 = 10 !== '10';
console.log(desigualdadEstricta2);// se imprime true el valor de la variable desigualdadEstricta2

//Mayor que 
let mayorQue = 10 > 5;  
console.log(mayorQue);// se imprime true el valor de la variable mayorQue

//Menor que
let menorQue = 10 < 5;
console.log(menorQue);// se imprime false el valor de la variable menorQue

//Mayor o igual que 
let mayorOIgualQue = 10 >= 10;
console.log(mayorOIgualQue);// se imprime true el valor de la variable mayorOIgualQue

//Menor o igual que
let menorOIgualQue = 10 <= 5;
console.log(menorOIgualQue);// se imprime false el valor de la variable menorOIgualQue

//Operadores lógicos

//AND
let and = (10 > 5) && (10 < 20);
console.log(and);// se imprime true el valor de la variable and

//OR
let or = (10 > 5) || (10 > 20);
console.log(or);// se imprime true el valor de la variable or

//NOT
let not = !(10 > 5);
console.log(not);// se imprime false el valor de la variable not

//Operadores de concatenación

//Concatenación de strings
let concat = 'Hola ' + 'Mundo';
console.log(concat);// se imprime Hola Mundo el valor de la variable concatenación

//Concatenación y asignación
let concat2 = 'Hola '; 
concat2 += 'Mundo';//concat2 = concat2 + 'Mundo'
console.log(concat2);// se imprime Hola Mundo el valor de la variable concat2

//Operadores ternarios
// Ejemplo 1: Asignar un valor a una variable basado en una condición
let edad = 15;
let tipo = edad >= 18 ? 'Adulto' : 'Menor';
console.log(tipo); // Se imprime 'Menor'

// Ejemplo 2: Elegir qué función ejecutar basado en una condición
let saludable = true;
saludable ? console.log('Puedes salir a correr') : console.log('Deberías descansar');

// Ejemplo 3: Elegir qué valor retornar en una función
function obtenerPrecio(tieneDescuento) {
  return tieneDescuento ? 9.99 : 19.99;
}
console.log(obtenerPrecio(true)); // Se imprime 9.99

// Operadores de flujo

//If
let edad2 = 15;
if (edad2 >= 18) {
  console.log('Eres mayor de edad');
}

//If...else
let edad3 = 15;
if (edad3 >= 18) {
  console.log('Eres mayor de edad');
} else {
  console.log('Eres menor de edad');
}

//If...else if...else
let edad4 = 15;
if (edad4 >= 18) {
  console.log('Eres mayor de edad');
} else if (edad4 >= 13) {
  console.log('Eres un adolescente');
} else {
  console.log('Eres un niño');
}

//Switch
let dia = 3;
switch (dia) {
  case 1:
    console.log('Lunes');
    break;
  case 2:
    console.log('Martes');
    break;
  case 3:
    console.log('Miércoles');
    break;
  case 4:
    console.log('Jueves');
    break;
  case 5:
    console.log('Viernes');
    break;
  case 6:
    console.log('Sábado');
    break;
  case 7:
    console.log('Domingo');
    break;
  default:
    console.log('Día inválido');
}// se imprime Miércoles el valor de la variable dia

//For se ejecuta un número determinado de veces
for (let i = 0; i < 5; i++) {
  console.log(i);
}// se imprime 0 1 2 3 4

//While se ejecuta después de comprobar la condición, y se detiene cuando la condición es falsa
let i = 0;
while (i < 5) {
  console.log(i);
  i++;
}// se imprime 0 1 2 3 4

//Do...while se ejecuta al menos una vez, y luego se ejecuta mientras la condición sea verdadera
let i2 = 0;
do {
  console.log(i2);
  i2++;
} while (i2 < 5);// se imprime 0 1 2 3 4

/*
 DIFICULTAD EXTRA(opcional):
 * Crea un programa que imprima por consola todos los números comprendidos
  * entre 10 y 55(incluidos), pares, y que no son ni el 16 ni múltiplos de 3.
*/

console.log('DIFICULTAD EXTRA(opcional):');

for (let i = 10; i <= 55; i++) {//extra inicia en 10 y se ejecuta mientras extra sea menor que 56
  if (i % 2 === 0 && i !== 16 && i % 3 !== 0) { //si el numero es par y no es 16 y no es multiplo de 3
    console.log(i); //imprime el numero en extra
  }
}

console.log('Ejercicio con While');

let extra = 10; //extra inicia en 10
while (extra <= 55) { //se ejecuta mientras extra sea menor que 56
  if (extra % 2 === 0 && extra !== 16 && extra % 3 !== 0) { //si el numero es par y no es 16 y no es multiplo de 3
    console.log(extra); //imprime el numero en extra
  }
  extra++; //extra se incrementa en 1
}

console.log('FIN');
