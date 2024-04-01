document.addEventListener("DOMContentLoaded", function () {
  const obras = [
    {
      id: 1,
      nombre: "Obra 1",
      imagen: "https://via.placeholder.com/50x50/123",
      precio: 100,
    },
    {
      id: 2,
      nombre: "Obra 2",
      imagen: "https://via.placeholder.com/50x50/321",
      precio: 200,
    },
    {
      id: 3,
      nombre: "Obra 3",
      imagen: "https://via.placeholder.com/50x50/331",
      precio: 300,
    },
    {
      id: 4,
      nombre: "Obra 4",
      imagen: "https://via.placeholder.com/50x50/121",
      precio: 400,
    },
    {
      id: 5,
      nombre: "Obra 5",
      imagen: "https://via.placeholder.com/50x50/111",
      precio: 500,
    },
    {
      id: 6,
      nombre: "Obra 6",
      imagen: "https://via.placeholder.com/50x50/761",
      precio: 600,
    },
    {
      id: 7,
      nombre: "Obra 7",
      imagen: "https://via.placeholder.com/50x50/441",
      precio: 700,
    },
  ];

  let selected = [];

  const myGallery = document.querySelector(".gallery");
  const myCart = document.querySelector(".shopping-cart");
  const addCartButton = document.getElementById("addCartButton");

  obras.forEach((e) => {
    const myDiv = document.createElement("div");
    myDiv.classList.add("chart");

    myDiv.innerHTML = `
    <img src="${e.imagen}" alt="${e.nombre}" style="width: 100%; max-width: 300px;" />
    <p>${e.nombre} - ${e.precio}</p>

    <label for="checking" class="checkbox">
      <input type="checkbox" name="checking" data-id="${e.id}" />
      <span class="check-mark"></span>
    </label>
     `;
    myGallery.appendChild(myDiv);
  });

  myGallery.addEventListener("change", (event) => {
    /* if ("condition") { */
    const chartID = Number(event.target.dataset.id);

    if (event.target.checked) {
      selected.push(obras.find((e) => e.id === chartID));
    } else {
      selected = selected.filter((e) => e.id !== chartID);
    }

    addCartButton.disabled = selected.length === 0 ? true : false;
    /* } */
  });

  addCartButton.onclick = function () {
    actualizarCarrito();
  };

  function actualizarCarrito() {
    myCart.innerHTML = ` 
    <h2>Carrito</h2>
    <br/>
    <ul>
    `;
    selected.forEach((e) => {
      const li_HTML = document.createElement("li");
      li_HTML.innerHTML = `
      <img src="${e.imagen}" alt="${e.nombre}" style="width: 30px; height: 30px; margin-right: 10px; object-fit: cover;" />
      <br/>
      ${e.nombre} - ${e.precio}
      <br/>
      `;
      myCart.appendChild(li_HTML);
    });
    let total = selected.reduce((accumulator, element) => {
      return accumulator + element.precio
    }, 0);
    myCart.innerHTML =
      myCart.innerHTML +
      `
    </ul>
    <p>Total: ${total}</p>
    `;
  }

  //muestra por consola las obras
  console.log(obras);
});
