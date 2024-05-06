document.addEventListener("DOMContentLoaded", () => {
  let alumno1 = ["Pepin", 16];
  let alumno2 = ["Norberto", 22];
  let alumno3 = ["Eustafio", 30];
  let alumno4 = ["Casimiro", 52];
  let alumno5 = ["Pancho", 43];

  const clase = [];

  clase.push(alumno1, alumno2, alumno3, alumno4, alumno5);

  const iterarArray = (array) => {
    for (let index = 0; index < array.length; index++) {
      const element = array[index];
      // Agregamos 1 al index para que empiece desde el 1 y no desde el 0 (como suele hacer)
      element.unshift(`id: ${index + 1}`);
      console.log(element);
      const p = document.createElement("p");
      p.innerHTML = `El alumno con ${element[0]} se llama ${element[1]} y tiene ${element[2]} años.`;
      document.getElementById("for").appendChild(p);
      p.style.padding = "5px";
    }
  };
  iterarArray(clase);
});
