
//************************************************************************************************************************/
//************************************************************************************************************************/
//*******************************  CONVIERTE EN FUNCIONES LOS PROGRAMAS DEL EJERCICIO ANTERIOR ***************************/
//************************************************************************************************************************/
//************************************************************************************************************************/

// Clasificación por edades
// Escribe  una función que clasifique a las personas en categorías según su edad: menor de 12 años es niño, de 12 a 18 adolescente, de 19 a 60 adulto y mayor de 60 anciano.
// Invoca esa función para una edad de 45 años
// FUNCION
function clasificacionEdades(edad){
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
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function calificacion(calificacion){

    if(calificacion >=6){
        console.log("Has aprobado")
      }
      if(calificacion <6){
        console.log("Has suspendido")
      }
      

}



// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

calificacion(5);
calificacion(6);
calificacion(4);

// Identificación de números negativos, positivos y cero
// Escribe  una función que identifique si un número es positivo, negativo o cero.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function numeros(numero){



    if(numero <0 ){ 
        console.log("el numero es negativo")
      } else if(numero > 0){
        console.log("el número es positivo")
      } else{
        console.log("el número es 0")
      }
      
}




// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

numeros(4);
numeros(0);
numeros(-7);

// Descuentos en una tienda
// Implementa una función de descuentos donde, si la compra es mayor a $100, se aplica un descuento del 10%.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/
function descuento(compra){
    if (compra > 100) {
        let descuento = compra * 0.10;
        let total = compra - descuento;
        console.log(`Total con descuento: $${total}`);
      } else {
        console.log(`Total: $${compra}`);
      }
}


// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

descuento(1000);
descuento(10);


// Descuento por día de la semana
// Implementa otra función de descuentos donde Los miércoles hay un 15% de descuento en todas las compras. Calcula el total considerando este descuento si hoy es miércoles.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function descuentoDias(precio,dia){

    if(dia =="miércoles"){
        let descuento = precio * 0.15
        let total = precio - descuento
      console.log(`El total con descuento es ${total}`)
      
      }
    else {

        total = precio;
  
        console.log(`El total es ${total}`)
    }

}
  

// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

descuentoDias(100,"miércoles");
descuentoDias(1000,"martes");


// Determinar el mayor de tres números
// Crea  una función que dados tres números, determine cuál es el mayor.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function testNumeros(a,b,c){
    if (a > b && a>c){
        console.log(`${a} es el mayor`)
      } 
      else if(b > a && b > c){
        console.log(`${b} es el mayor`)
      }
      else if(c> a && c > a){
        console.log(`${c} es el mayor`)
      }
    }

// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

testNumeros(20,1,5);
testNumeros(3,210,8);

// Categorías de películas por edad
// Crea  una función que basado en la edad de una persona, indica si puede ver una película para mayores de 18 años.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function edadPeli(edadPersona){

    if (edadPersona < 18){
        console.log("no puedes ver la pelicula")
      }
      else{ console.log("puedes ver la pelicula")}


}





// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

edadPeli(15);
edadPeli(18);
edadPeli(21);
  

// Calculadora simple de IMC
// Realiza una función que sea una calculadora simple de IMC (Índice de Masa Corporal) e indica si la persona está bajo peso, en peso normal, o con sobrepeso. Considera bajo peso si el IMC es menor a 18.5, normal entre 18.5 y 24.9, y sobrepeso si es 25 o más.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function IMC(peso,altura){
    let imc = peso / (altura * altura);
    if (imc < 18.5) {
      console.log("Bajo peso");
    } else if (imc <= 24.9) {
      console.log("Peso normal");
    } else {
      console.log("Sobrepeso");
    }
}



// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

IMC(60,2);
IMC(100,1.60);
IMC(82,1.82);


//Calcular el Índice de Hidratación Personalizado (IHP= consumo Agua al dia (ml) / peso (Kg)):
// Realiza una función que sea una calculadora simple del IHP te indica si estás bebiendo la cantidad adecuada de agua al día, según tu peso. La recomendación general es beber al menos 35 ml de agua por cada kilo de peso corporal.
// Bajo: Menos de 30 ml por kilo.
// Adecuado: Entre 30 ml y 35 ml por kilo.
// Óptimo: Más de 35 ml por kilo.
// FUNCION
//*******************************  ESCRIBE A CONTINUACIÓN TU CÓDIGO PARA RESOLVER EL EJC *********************************/

function calIHP(consumoAguaDiaL,pesoKg){

    let IHP = (consumoAguaDiaL)/pesoKg


if (IHP < 30){
  console.log("IHP: Bajo")
} 
else if (IHP >= 30 && IHP <= 35  ){
  console.log("IHP: adecuado")
} 
else if (IHP > 35 ){
  console.log("IHP: óptimo")
} 

console.log(`Para optimizar tu IPH debes beber entre ${30*pesoKg} y ${35*pesoKg} ml de agua `)

}

// INVOCACION
//*******************************  ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ************************************/

calIHP(1000,90);
calIHP(3000,60)
calIHP(2500,82)

