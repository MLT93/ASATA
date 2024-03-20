window.document.addEventListener("DOMContentLoaded", () => {
  let alumno1 = ["Pepin", 16];
  let alumno2 = ["Norberto", 22];
  let alumno3 = ["Eustafio", 30];
  let alumno4 = ["Casimiro", 52];
  let alumno5 = ["Pancho", 43];

  const clase = [];

  // Creación de Matriz
  clase.push(alumno1, alumno2, alumno3, alumno4, alumno5);

  const iterarArray = (array) => {
    // `while` no sigue iterando indeterminadamente como un `for`. Ahorra recursos 
    // Es ideal para iterar cosas indeterminadas
    // El `aux` vendría a ser lo mismo que el `index` en un `for`
    let aux = 0;
    while (aux < array.length) {
      // Acá el `element` equivale a un "Array" a su vez, porque creamos una Matriz anteriormente
      const element = array[aux];
      element.unshift(`id: ${aux + 1}`);
      console.log(element);
      const p = document.createElement("p");
      p.innerHTML = `El alumno con ${element[0]} se llama ${element[1]} y tiene ${element[2]} años.`;
      document.getElementById("while").appendChild(p);
      p.style.padding = "5px";
      aux++;
    }
  };
  iterarArray(clase);
});
