const buttonPrimos = document.getElementById("buttonPrimos");
let numUser = Number(prompt("Ingresa un número"));
numUser?console.log(numUser) : console.log("No hay número")
const primos = [];
buttonPrimos.addEventListener("click", () => {
  // Este algoritmo para encontrar números primos se llama "Criba de Eratóstenes".
  for (let i = 2; i <= numUser; i++) {
    if (i % 2 === 0) {
      continue;
    }
    for (let j = 3; j * j <= numUser; j += 2) {
      if (i % j === 0) {
        break;
      }
    }
    primos.push(i);
  }

  const divResultado = document.getElementById("resultado");
  const p = document.createElement("p");
  p.innerHTML = `Los números primos hasta ${numUser} son: ${primos.join(", ")}`;
  divResultado.appendChild(p)
});


/**
 * const buttonCounter = document.getElementById("buttonPrimos");
let numUser = Number(prompt("Ingresa un número"));
numUser ? console.log(`Número elegido: ${numUser}`) : console.log("No se ha recibido el número");
let counter = 0;
buttonCounter.addEventListener("click", () => {
  for (let i = 1; i <= numUser; i++) {
    counter = counter + 1;
  }

  const divResultado = document.getElementById("resultado");
  const p = document.createElement("p");
  p.innerHTML = `La suma total es ${counter}`;
  divResultado.appendChild(p);
});

 */