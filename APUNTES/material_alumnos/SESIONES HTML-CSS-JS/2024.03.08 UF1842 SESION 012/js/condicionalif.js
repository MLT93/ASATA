// var edad = prompt("¿Cuál es tu edad?");


// if(edad == 18){

//     document.write("Actualmente tienes " + edad + " años. Enhorabuena ya eres mayor de edad.Tienes acceso.");

// }
// else if(edad < 18){

//     document.write("Actualmente tienes " + edad + " años. No tienes acceso por ser menor de edad.");
// }
// else{

//     document.write("Actualmente tienes " + edad + " años. Tienes acceso.");
// }




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

if(operacion == "sumar" && operacion != "restar" ){

    console.log("La suma de "+ a + " y " + b + " es:");
    console.log(suma(a,b));
    // document.write("La suma de "+ a + " y " + b + " es: " + suma(a,b));
    document.getElementById("respuesta").innerHTML = "La suma de "+ a + " y " + b + " es: " + suma(a,b);

}



if(operacion == "restar" || operacion == "restame" ){
    console.log("La resta de "+ a + " y " + b + " es:");
    console.log(resta(a,b));
    document.write("La resta de "+ a + " y " + b + " es: " + resta(a,b));

}

if(operacion == "multiplicar"){
    console.log("La multiplicación de "+ a + " y " + b + " es:");
    console.log(multiplicacion(a,b));
    document.write("La resta de "+ a + " y " + b + " es: " + multiplicacion(a,b));

}


if(operacion == "dividir"){
    console.log("La división de "+ a + " y " + b + " es:");
    console.log(division(a,b));
    document.write("La resta de "+ a + " y " + b + " es: " + division(a,b));
}
