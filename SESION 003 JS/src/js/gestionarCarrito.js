const imgContraReembolso = "../assets/img/contrareembolso.png";
const imgPayPal = "../assets/img/paypal.png";
const imgTarjeta = "../assets/img/tarjeta.png";

const buttonCarrito = document.getElementById("buttonCarrito");
buttonCarrito.onclick = function () {
  let totalCompra = 0;
  let carrito = [];
  do {
    let nombreProducto = prompt("Ingrese el nombre del producto.");
    let precioUnitarioProducto = Number(
      prompt(`Introduzca el precio unitario de ${nombreProducto}`)
    );
    // `isNaN()` comprueba si es un `Number` o no, devolviendo `true` o `false`
    if (precioUnitarioProducto <= 0 || isNaN(precioUnitarioProducto)) {
      alert(
        "El precio ingresado no es válido. Por favor, ingrese de nuevo el precio."
      );
      // `continue` sigue el con el funcionamiento del flujo del código en los bucles
      continue;
    }
    let cantidadProducto = Number(
      prompt(`Introduzca cantidad de unidades del producto ${nombreProducto}`)
    );
    if (cantidadProducto <= 0 || isNaN(cantidadProducto)) {
      alert(
        "La cantidad ingresada no es válida. Por favor, ingrese nuevamente la cantidad."
      );
      continue;
    }
    let subTotal = precioUnitarioProducto * cantidadProducto;
    // Esto es igual a: `totalCompra = totalCompra + subTotal`
    totalCompra += subTotal;

    carrito.push({
      nombre: nombreProducto,
      precio: precioUnitarioProducto,
      cantidad: cantidadProducto,
      subtotal: subTotal,
    });

    // `confirm()` es un mensaje de confirmación que devuelve `true` o `false`
    let seguirComprando = confirm("¿Desea agregar más productos?");
    if (!seguirComprando) {
      break;
    }
  } while (true);

  mostrarCarrito(carrito, totalCompra);

  pasarelaDePago(totalCompra);
};

function mostrarCarrito(carrito, totalCompra) {
  const carritoDiv = document.getElementById("carrito");
  let titleHTML = "<h2>Mi carrito de la compra</h2>";
  carritoDiv.innerHTML = titleHTML;

  for (let iterator of carrito) {
    let productoHTML = `<p>Nombre: ${iterator.nombre} <br>Precio unitario: ${iterator.precio}€ <br>Cantidad: ${iterator.cantidad} <br>SUBTOTAL: ${iterator.subtotal}€</p>`;
    carritoDiv.innerHTML += productoHTML;
  }

  let totalHTML = `<h3>TOTAL: ${totalCompra}€</h3>`;
  carritoDiv.innerHTML += totalHTML;
}

function pasarelaDePago(totalCompra) {
  const pasarela = document.getElementById("pasarela");

  const tituloHTML = `<h2>¿Con qué deseas pagar? TOTAL: ${totalCompra}€</h2>`;
  pasarela.innerHTML = tituloHTML;

  const a_TARJETA = document.createElement("a");
  a_TARJETA.textContent = "Pagar con tarjeta";
  a_TARJETA.href = "https://www.bancsabadell.com/bsnacional/es/particulares/";

  const img_TARJETA = document.createElement("img");
  img_TARJETA.src = imgTarjeta;
  pasarela.appendChild(a_TARJETA);
  a_TARJETA.appendChild(img_TARJETA);

  const contraReembolso = document.createElement("a");
  contraReembolso.textContent = "Pagar con contra reembolso";
  contraReembolso.href = "https://outvio.com/es/blog/envio-contrareembolso/";
  const contraReembolsoIMG = document.createElement("img");
  contraReembolsoIMG.setAttribute("src", imgContraReembolso);
  pasarela.appendChild(contraReembolso);
  contraReembolso.appendChild(contraReembolsoIMG);

  const payPal = document.createElement("a");
  payPal.textContent = "Pagar con PayPal";
  payPal.href = "https://www.paypal.com/es/home";
  const payPalIMG = document.createElement("img");
  payPalIMG.src = imgPayPal;
  pasarela.appendChild(payPal);
  payPal.appendChild(payPalIMG);
}
