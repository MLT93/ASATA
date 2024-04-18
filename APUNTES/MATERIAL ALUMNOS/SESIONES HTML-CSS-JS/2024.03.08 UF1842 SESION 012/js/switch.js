
// var edad = prompt("¿Cuál es tu edad?");
// edad = parseInt(edad);

function suma(a,b){
    return a + b;
}

function resta(a,b){
    return a - b;
}

function multiplicacion(a,b){
    return a * b;
}

function division(a,b){
    return a / b;
}


var a = prompt("dame el valor a");
var b = prompt("dame el valor b");
var operacion = prompt("¿Qué operación quieres hacer?");

a = parseInt(a);
b = parseInt(b);


switch(operacion){

 case "sumar":
    console.log("La suma de "+ a + " y " + b + " es:");
    console.log(suma(a,b));
    document.getElementById("respuesta").innerHTML = "La suma de "+ a + " y " + b + " es: " + suma(a,b);
    break;

case "restar":
    console.log("La resta de "+ a + " y " + b + " es:");
    console.log(resta(a,b));
    document.getElementById("respuesta").innerHTML = "La resta de "+ a + " y " + b + " es: " + resta(a,b);
    break;


case "dividir":
    console.log("La división de "+ a + " y " + b + " es:");
    console.log(division(a,b));
    document.getElementById("respuesta").innerHTML = "La división de "+ a + " y " + b + " es: " + division(a,b);
    break;

case "multiplicar":
    console.log("La multiplicación de "+ a + " y " + b + " es:");
    console.log(division(a,b));
    document.getElementById("respuesta").innerHTML = "La multiplicaciónión de "+ a + " y " + b + " es: " + multiplicacion(a,b);
    break;


default:

    document.getElementById("respuesta").innerHTML = "Esa operación no existe, vuelva a introducir los valores y una operación correcta.";
    break;

}



// switch(edad){

//     case 18:
//         document.write("Actualmente tienes " + edad + " años. Enhorabuena ya eres mayor de edad.Tienes acceso.");
//         break;

//     case 50:
//         document.write("Actualmente tienes " + edad + " años. Actualmente supera el limite de edad. No tiene acceso.");
//         break;

//     default:
//         document.write("Actualmente tienes " + edad + " años. Tienes acceso.");
//         break;

// }


























// if(edad == 18){

//     document.write("Actualmente tienes " + edad + " años. Enhorabuena ya eres mayor de edad.Tienes acceso.");

// }
// else if(edad < 18){

//     document.write("Actualmente tienes " + edad + " años. No tienes acceso por ser menor de edad.");
// }
// else{

//     document.write("Actualmente tienes " + edad + " años. Tienes acceso.");
// }




