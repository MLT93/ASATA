let edad = prompt("¿Cuál es tu edad?");
// Hay que asignar el nuevo valor (en este caso, la conversión de tipos) a una variable para que el cambio surta efecto
edad = Number(edad);

// Acordate que se realizan acciones en base al `value` que pueda asumir una `key` en específico. Esto significa que solo se realizarán operaciones en base al valor que recibe su clave (la variable) en comparación con los posibles casos que haya y, si se encuentra algún match, entonces se realizará ese código. Además, en "case" no es común realizar comparaciones porque sólo acepta los posibles "casos" o valores que pueda tener la expresión asociada, a no ser que utilicemos booleanos.
/* switch (edad) {
  case 18:
    document.getElementById(
      "switch"
    ).innerHTML = `Tu edad es: ${edad}. Sos mayor de edad!`;
    break;
  case 10:
    document.getElementById(
      "switch"
    ).innerHTML = `Tu edad es: ${edad}. Volvete a casa!`;
    break;

  default:
    document.getElementById(
      "switch"
    ).innerHTML = `No has introducido tu edad correctamente.`;
    break;
} */

// En este caso, se realiza una operación en base a la clave `true`. Esto significa que todo lo que no sea verdadero, es falso, por lo tanto en este caso podemos poner comparaciones dentro de los "case", dado que estas mismas devuelven `true` o `false`
switch (true) {
  case edad >= 18:
    document.getElementById(
      "switch"
    ).innerHTML = `Tu edad es: ${edad}. Sos mayor de edad!`;
    break;
  case edad < 18:
    document.getElementById(
      "switch"
    ).innerHTML = `Tu edad es: ${edad}. Volvete a casa!`;
    break;

  default:
    document.getElementById(
      "switch"
    ).innerHTML = `No has introducido tu edad correctamente.`;
    break;
}

function sum(a, b) {
  return a + b;
}

function sub(a, b) {
  return a - b;
}

function multi(a, b) {
  return a * b;
}

function div(a, b) {
  return a / b;
}

console.log(sum(22, 22));

let a = prompt("Valor A:");
let b = prompt("Valor B:");
let operation = prompt("¿Qué operación desea hacer?");

switch (operation) {
  case "sumar":
    document.getElementById(
      "switch"
    ).innerHTML = `La suma entre ${a} y ${b} es igual a ${sum(
      Number(a),
      Number(b)
    )}`;
    break;
  case "restar":
    document.getElementById(
      "switch"
    ).innerHTML = `La resta entre ${a} y ${b} es igual a ${sub(
      Number(a),
      Number(b)
    )}`;
    break;
  case "multiplicar":
    document.getElementById(
      "switch"
    ).innerHTML = `La multiplicación entre ${a} y ${b} es igual a ${multi(
      Number(a),
      Number(b)
    )}`;
    break;
  case "dividir":
    document.getElementById(
      "switch"
    ).innerHTML = `La división entre ${a} y ${b} es igual a ${div(
      Number(a),
      Number(b)
    )}`;
    break;
  default:
    document.getElementById("switch").innerHTML =
      "Error: las operaciones son 'sumar' | 'restar' | 'multiplicar' | 'dividir'";
    break;
}
