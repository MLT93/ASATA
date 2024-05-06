function gestionarCarrito(){

let totalCompra = 0;
let carrito = [];


do{
    
    let nombreProducto = prompt("Ingrese nombre producto");
    let precioUnitario = parseFloat(prompt("Introduzca el precio unitario de " + nombreProducto ));
    if(precioUnitario<=0 || isNaN(precioUnitario)){
        alert("El precio ingresado no es válido. Por favor, ingreselo de nuevo.");
        continue;
    }

    let cantidad       = parseInt(prompt("Introduzca cantidad de unidades del producto " + nombreProducto));
    if(cantidad<=0 || isNaN(cantidad)){
        alert("La cantidad ingresada no es válida. Por favor, ingresela de nuevo.");
        continue;
    }

    let subTotal = precioUnitario*cantidad;
    totalCompra += subTotal;// es lo mismo que esto ---> totalCompra = totalCompra +subTotal;
    
    
    carrito.push(
        {
            nombre: nombreProducto,
            precio: precioUnitario,
            cantidad: cantidad,
            subtotal: subTotal
        }
    );
        
    let seguirComprando = confirm("¿Desea agregar más productos?");
    if(!seguirComprando){
        break;
    }

}
while(true);


mostrarCarrito(carrito,totalCompra);

pasareladepago();

}


function mostrarCarrito(carrito, totalCompra){


    var titulo = "Mi carrito de la compra"
    var lineaHTML =`<h2> ${titulo} </h2>`; 

    for (let articulo of carrito){
    
        lineaHTML = lineaHTML + "<p>" + articulo.nombre + ":  precio unitario: " +  articulo.precio + " cantidad: " +articulo.cantidad  +  "  --------------   "  + articulo.subtotal +" €</p>";
    }

    lineaHTML = lineaHTML + "<h2> TOTAL:    " + totalCompra + " €</h2>";

    const carritoDIV = document.getElementById("carrito");
    carritoDIV.innerHTML = lineaHTML;


}


function pasareladepago(){


    var pago = document.getElementById("mpago");

    
    var a1    = document.createElement("a");
    a1.href="https://www.paypal.com/es/home";

    var img1  = document.createElement("img");
    // img1.src = "img/tjt.png";
    img1.setAttribute("src","img/tjt.png");
    
    var pago1 = document.createElement("div");
    pago1.innerText = "Pago con Paypal"
    
    
    pago.appendChild(a1); //inserta como hijo el elemento a1
    a1.appendChild(img1);
    a1.appendChild(pago1);
    

}