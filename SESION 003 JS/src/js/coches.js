window.document.addEventListener("DOMContentLoaded", () => {
  let coches = [];
  const pedirValue = (arr) => {
    alert(
      "Te vamos a pedir que introduzcas marcas de coches. \n\n Cuando desees parar, escribe 'FINALIZAR'."
    );

    let counter = 0;
    while (counter < 5) {
      let value = prompt("Escribe una marca de automóvil.");
      if (value === "FINALIZAR") {
        break;
      } else {
        arr.push(value.toUpperCase());
        counter++;
      }
    }
  };
  pedirValue(coches);

  console.log(coches);

  const iterarArray = (array) => {
    let aux = 0;
    while (aux < array.length) {
      const element = array[aux];
      console.log(array);
      const p = document.createElement("p");
      p.innerHTML = `El coche es de marca: ${element}`;
      document.getElementById("while").appendChild(p);
      p.style.padding = "5px";
      aux++;
    }
  };
  iterarArray(coches);
});
