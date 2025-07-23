document.addEventListener("DOMContentLoaded", () => {
  // for (crear variable; crear condición con esa variable; modificar la variable) {}
  // Itera variables o arrays siguiendo un índice
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
    const ele = diasSemana[index]; // Cada elemento del array según su iteración (en la vuelta del bucle en el que esté según el índice)

    console.log(ele);
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

      /*       if (element.length - 1 < 18) {
        console.log("Este alumno es menor de edad.");
      } else {
        clase2.push(element);
      }
      console.log(clase2); */
    }
  };
  iterarArray(clase);
});
