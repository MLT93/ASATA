document.addEventListener("DOMContentLoaded", () => {
  // for (crear variable; crear condición con esa variable; modificar la variable) {}
  // Pregunta antes de disparar! Realiza una operación si una condición se cumple
  // Es ideal para iterar cosas determinadas
  for (let i = 0; i <= 10; i++) {
    console.log(`${i}`);
  }

  let diasSemana = [
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
    "Domingo",
  ];

  for (let index = 0; index < diasSemana.length; index++) {
    const element = diasSemana[index];

    console.log(element);
  }

  let alumno1 = ["Pepin", 16];
  let alumno2 = ["Norberto", 22];
  let alumno3 = ["Eustafio", 30];
  let alumno4 = ["Casimiro", 52];
  let alumno5 = ["Pancho", 43];

  const clase = [];

  clase.push(alumno1, alumno2, alumno3, alumno4, alumno5);

  const iterarArray = (array) => {
    for (let index = 0; index < array.length; index++) {
      /* const clase2 = []; */
      const element = array[index];
      element.unshift(`id: ${index}`);
      console.log(element);

      /*       if (element.lenght - 1 < 18) {
        console.log("Este alumno es menor de edad.");
      } else {
        clase2.push(element);
      }
      console.log(clase2); */
    }
  };
  iterarArray(clase);
});
