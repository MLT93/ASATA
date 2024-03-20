document.addEventListener("DOMContentLoaded", () => {
  let edad = prompt("¿Cuál es tu edad?");

  if (edad === String(18)) {
    document.write("Enhorabuena! Ya sos mayor de edad.");
  } else if (edad < String(18)) {
    document.write("No tenés acceso");
  }

  document.write(`Actualmente tenés ${edad} años.`);

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

  function rest(a, b) {
    return a % b;
  }

  /* console.log(sum(22, 22)); */

  let a = prompt("Valor A:");
  let b = prompt("Valor B:");
  let operation = prompt("¿Qué operación desea hacer?");

  if (operation === "sumar") {
    document.getElementById(
      "if-else"
    ).innerHTML = `La suma entre ${a} y ${b} es igual a ${sum(
      Number(a),
      Number(b)
    )}`;
  }
  if (operation === "restar" || operation === "restame") {
    document.getElementById(
      "if-else"
    ).innerHTML = `La resta entre ${a} y ${b} es igual a ${sub(
      Number(a),
      Number(b)
    )}`;
  }
  if (operation === "multiplicar") {
    document.getElementById(
      "if-else"
    ).innerHTML = `La multiplicación entre ${a} y ${b} es igual a ${multi(
      Number(a),
      Number(b)
    )}`;
  }
  if (operation === "dividir") {
    document.getElementById(
      "if-else"
    ).innerHTML = `La división entre ${a} y ${b} es igual a ${div(
      Number(a),
      Number(b)
    )}`;
  }
  if (operation === "resto") {
    document.getElementById(
      "if-else"
    ).innerHTML = `El resto de la división entre ${a} y ${b} es igual a ${rest(
      Number(a),
      Number(b)
    )}`;
  }
});
