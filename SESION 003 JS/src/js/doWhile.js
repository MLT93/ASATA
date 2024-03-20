window.document.addEventListener("DOMContentLoaded", () => {
  const pedirValue = () => {
    let numAleatory = Math.floor(Math.random() * 11); // Genera un número entre 0 y 100 (ambos inclusive)
    console.log(numAleatory);

    let numUser;

    // Dispara antes de preguntar! Realiza operaciones antes de ejecutar la condición y repite la operación si la condición se cumple.
    // Ideal para ejecutar la función al menos una vez (ej. casos 'Trigger')
    // `continue;`
    // `break;`
    do {
      numUser = prompt("Introduzca un numero que sea entre 1 y 10.");

      if (numUser < numAleatory) {
        alert("Casi! Es más arriba.");
        continue;
      } else if (numUser > numAleatory) {
        alert("Aún nada! Es más abajo.");
        continue;
      } else if (numUser === numAleatory) {
        alert("Yeppa! Lo conseguiste!");
        break;
      }
    } while (numAleatory !== numUser);
  };
  pedirValue();
});
