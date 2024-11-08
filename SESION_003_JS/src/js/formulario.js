// Evento que toma la información del formulario y realiza una función según ese evento
document.getElementById("formulario").addEventListener("submit", (event) => {
  // Evita que el evento que ocurre, recargue la página y borre la información
  event.preventDefault();

  const nombre = document.getElementById("nombreID").value;
  const precio = Number(document.getElementById("precioID").value);
  const colores = document
    .getElementById('coloresID')
    .value.split(',') // El método `split()` convierte cadenas de texto en arrays. Dividirá del texto en base a lo encontrado en los paréntesis
    .map((element) => element.trim()); // El método `trim()` elimina los espacios anteriores y posteriores de la cadena de texto
  const cantidad = Number(document.getElementById("cantidadID").value);

  // Objeto que guarda la información recibida
  const producto = {
    nombre: nombre,
    precio: precio,
    colores: colores,
    disponibilidad: cantidad,
  };

  console.log(producto);

  mostrarInfo(producto);
});

const mostrarInfo = (objeto) => {
  // Tomo el elemento que tiene el `id="container"`
  const container = document.getElementById("container");

  // Creo un nuevo elemento. En este caso `div`
  const productContainer = document.createElement("div");
  // Añado una clase a ese elemento. En este caso `producto`
  productContainer.classList.add("producto");

  const nameElement = document.createElement("p");
  nameElement.classList.add("nombre");
  nameElement.innerHTML = `Nombre del producto: ${objeto.nombre}`;

  const priceElement = document.createElement("p");
  priceElement.classList.add("precio");
  priceElement.innerHTML = `Precio del producto: ${objeto.precio}`;

  const coloresElement = document.createElement("p");
  coloresElement.classList.add("colores");
  coloresElement.innerHTML = `Colores posibles del producto: ${objeto.colores.join(
    " | "
  )}`;

  const disponibilidadElement = document.createElement("p");
  disponibilidadElement.classList.add("disponibilidad");
  disponibilidadElement.innerHTML = `Disponibilidad del producto: ${objeto.disponibilidad}`;

  // `appendChild()` es el método más común para añadir "hijos/anidar" dentro de otros elementos. Existen otros métodos con una funcionalidad parecida como `insertBefore()` y `insertAdjacentElement()`
  productContainer.appendChild(nameElement);
  productContainer.appendChild(priceElement);
  productContainer.appendChild(coloresElement);
  productContainer.appendChild(disponibilidadElement);

  container.appendChild(productContainer);
};
